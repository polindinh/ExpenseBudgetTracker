
<script>
    import { Bar } from 'vue-chartjs'
    export default {
        name: "TransactionsBar",
        extends:Bar,
       props: [
           'Month',
            'Year',
            'chartdata'
       ],
        data:()=>{
            return {
                Trans:[],
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {

                            label: function(tooltipItem, data) {
                                return tooltipItem.value;
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            barPercentage: 0.4
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },

        created () {
            this.getTransData()
        },
        methods:{
            getTransData(){

                fetch('/transaction/get?month='+this.Month+"&year="+this.Year)
                    .then(res=>res.json())
                    .then(res=>{

                        let dtt = [
                            {
                                label:  [],
                                backgroundColor: [],
                                data:[],
                            }
                        ];

                        let colors=[];

                        let days = [

                        ];


                        let labels= days;

                        /*generate chart data*/
                        res.forEach(item=>{
                            days.push(item.date);

                                dtt[0].label.push(item.date);
                                dtt[0].backgroundColor.push('#'+(Math.random()*0xFF7FFF<<0).toString(16));
                                dtt[0].data.push(item.total);


                        })
                        let cdata =  {
                            'labels': labels,
                            datasets: dtt
                        };

                        this.renderChart(cdata, this.options)


                        this.loading = false;

                    })
                    .catch((error) => {
                        this.loading=false;
                        console.error("error to get budgets")
                    })
            },
            dayOfMonth(month,year) {
                // Here January is 1 based
                //Day 0 is the last day in the previous month
                return new Date(year, month, 0).getDate();
                // Here January is 0 based
                // return new Date(year, month+1, 0).getDate();
            }
        }
    }
</script>

<style scoped>

</style>
