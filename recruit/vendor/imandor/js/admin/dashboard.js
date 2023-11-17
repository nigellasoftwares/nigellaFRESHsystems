$(document).ready(function() {
    $('#table-application-agent').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [1,2,3,4,5,6,7]    
        }]
    });
    
    /* Bar Chart Daily */
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxAdminBarchartDaily",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var myDailyChart = echarts.init(document.getElementById('bar-chart-daily'));
            
            optionDaily = {
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data: data.branches
                },
                toolbox: {
                    show : true,
                    feature : {
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                color: data.colors,
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : data.days
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : data.series
            };
            
            myDailyChart.setOption(optionDaily, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        myDailyChart.resize();
                    }, 100);
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
            });
        },
        error: function(jqXHR, textStatus, errorThrown){
            $.toast({
                heading: 'Error',
                text: 'Error get data Ajax.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right'
            });
        }
    });
    
    /* Bar Chart Monthly */
    
    $.ajax({
        url: "index.php?r=Ajax/AjaxAdminBarchartMonthly",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var myMonthlyChart = echarts.init(document.getElementById('bar-chart-monthly'));
            
            optionMonthly = {
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data: data.branches
                },
                toolbox: {
                    show : true,
                    feature : {
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                color: data.colors,
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : data.months
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : data.series
            };
            
            myMonthlyChart.setOption(optionMonthly, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        myMonthlyChart.resize();
                    }, 100);
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize);
            });
        },
        error: function(jqXHR, textStatus, errorThrown){
            $.toast({
                heading: 'Error',
                text: 'Error get data Ajax.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right'
            });
        }
    });
});