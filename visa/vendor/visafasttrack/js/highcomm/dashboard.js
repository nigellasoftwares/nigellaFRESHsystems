$(document).ready(function() {
    /* Bar Chart Daily */
    
    $.ajax({
        url: "index.php?r=Highcomm/AjaxBarchartDaily",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var myDailyChart = echarts.init(document.getElementById('bar-chart-daily'));
            
            optionDaily = {
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:[data.title]
                },
                toolbox: {
                    show : true,
                    feature : {
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                color: ["#55ce63"],
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
                series : [
                    {
                        name: data.title,
                        type: 'bar',
                        data: data.visas,
                        markPoint : {
                            data : [
                                {type : 'max', name: 'Max'},
                                {type : 'min', name: 'Min'}
                            ]
                        },
                        markLine : {
                            data : [
                                {type : 'average', name: 'Average'}
                            ]
                        }
                    }
                ]
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
        url: "index.php?r=Highcomm/AjaxBarchartMonthly",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var myMonthlyChart = echarts.init(document.getElementById('bar-chart-monthly'));
            
            optionMonthly = {
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:[data.title]
                },
                toolbox: {
                    show : true,
                    feature : {
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                color: ["#009efb"],
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
                series : [
                    {
                        name: data.title,
                        type: 'bar',
                        data: data.visas,
                        markPoint : {
                            data : [
                                {type : 'max', name: 'Max'},
                                {type : 'min', name: 'Min'}
                            ]
                        },
                        markLine : {
                            data : [
                                {type : 'average', name: 'Average'}
                            ]
                        }
                    }
                ]
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