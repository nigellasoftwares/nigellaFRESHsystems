$(document).ready(function() {
    var rolename = $('.role-user').html();
    var said = $('.said').val();
    var linkbarchartdaily = rolename === 'Master' ? 'index.php?r=Ajax/AjaxBarchartDaily&said=' + said : 'index.php?r=Ajax/AjaxBarchartDaily';
    var linkbarchartmonthly = rolename === 'Master' ? 'index.php?r=Ajax/AjaxBarchartMonthly&said=' + said : 'index.php?r=Ajax/AjaxBarchartMonthly';
    
	/* Demand Letter */
    
    $('#table-demand-letter').DataTable({
        columnDefs : [{
            orderable: false, 
            targets: [7]    
        }]
    });
	
    /* Bar Chart Daily */
    
    $.ajax({
        url: linkbarchartdaily,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var myDailyChart = echarts.init(document.getElementById('bar-chart-daily'));
            
            optionDaily = {
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:[data.branch]
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
                        name: data.branch,
                        type: 'bar',
                        data: data.workers,
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
        url: linkbarchartmonthly,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var myMonthlyChart = echarts.init(document.getElementById('bar-chart-monthly'));
            
            optionMonthly = {
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:[data.branch]
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
                        name: data.branch,
                        type: 'bar',
                        data: data.workers,
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