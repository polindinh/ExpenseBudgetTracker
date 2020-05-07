
<script>
    import { Bar } from 'vue-chartjs'
    export default {
        name: "BudgetBar",
        extends:Bar,
        props: {
            chartdata: {
            type: Object,
            default: null
            }
        },
        data:()=>{
            return {
                options: {
                    tooltips: {
                        stacked:true,
                        enabled: true,
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                suggestedMin: 0
                            },
                            barPercentage: 0.2
                        }],
                        yAxes:[{
                            stacked: true,
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                suggestedMin: 0
                            }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },
        mounted () {
            this.renderChart(this.chartdata, this.options)
        }
    }
</script>

<style scoped>

</style>
