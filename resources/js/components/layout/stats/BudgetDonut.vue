
<script>
    import { Doughnut } from 'vue-chartjs'
    export default {
        extends:Doughnut,
        name: "BudgetDonut",
         props: {
            chartData: {
            type: Object,
            default: null
            }
        },

        data(){
            return {
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },
        methods: {
            update() {
                this.$data._chart.update()
            }
        },
        mounted () {
            this.renderChart(this.chartData, this.options);
            //this.$data._chart.update()
        }

    }
</script>

<style scoped>

</style>
