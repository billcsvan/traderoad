
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&outputsize=full&apikey=demo",
        dataType: "json", // Set the dataType to "json" to parse JSON data
        success: function (data) {
            const timeSeriesDaily = data["Time Series (Daily)"];

            const formattedData = [];

            for (const date in timeSeriesDaily) {
                const entry = timeSeriesDaily[date];
                const timestamp = new Date(date).getTime();
                const open = parseFloat(entry["1. open"]);
                const high = parseFloat(entry["2. high"]);
                const low = parseFloat(entry["3. low"]);
                const close = parseFloat(entry["4. close"]);

                formattedData.push([timestamp, open, high, low, close]);
            }

            // Sort the data by timestamp in ascending order
            formattedData.sort((a, b) => a[0] - b[0]);

            // Create the Highcharts chart
            const chart = document.getElementById("chart-container");
            Highcharts.stockChart(chart, {
                rangeSelector: {
                    selected: 1
                },
                chart: {
                    backgroundColor: 'transparent',
                },
                title: {
                    text: 'IMB'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Price'
                    }
                },
                plotOptions: {
                    candlestick: {
                        color: 'red',
                        upColor: 'blue',
                        lineColor: 'red',
                        upLineColor: 'green'
                    }
                },
                series: [{
                    type: 'candlestick',
                    name: 'Stock Price',
                    data: formattedData,
                }]
            });
        },

        error: function () {
            console.log("Error fetching data for stock symbol:", stockSymbol);
        }
    });
    // Function to create stock containers
    function createStockContainers(container, stocks, type) {
        stocks.forEach(stock => {
            const stockDiv = $('<div class="' + type + '-container"></div>');
            stockDiv.attr('id', stock.symbol);
            stockDiv.append(`<p>${stock.symbol}</p>`);
            stockDiv.append(`<p>$${stock.price}</p>`);
            stockDiv.append(`<p>${stock.change}%</p>`);
            container.append(stockDiv);
        });
    }

    // Fetch the data.csv file using Ajax
    $.ajax({
        type: "GET",
        url: "../data/market1.csv",
        dataType: "text",
        success: function (csvData) {
            // Convert the CSV data into an array of objects
            const lines = csvData.split('\n');
            const headers = lines[0].split(',');
            const stocksData = [];

            for (let i = 1; i < lines.length; i++) {
                const currentLine = lines[i].split(',');
                const stockData = {};
                for (let j = 0; j < headers.length; j++) {
                    stockData[headers[j]] = currentLine[j];
                }
                stocksData.push(stockData);
            }

            // Separate gainers and losers based on the change value
            const gainers = stocksData.filter(stock => parseFloat(stock.change) > 0);
            const losers = stocksData.filter(stock => parseFloat(stock.change) < 0);

            // Display gainers and losers in separate divs
            const gainersContainer = $('#gainers-container');
            const losersContainer = $('#losers-container');

            createStockContainers(gainersContainer, gainers, 'gainer');
            createStockContainers(losersContainer, losers, 'loser');
        },
        error: function () {
            console.log("Error fetching data.csv");
        }
    });


    $(document).on('click', '.gainer-container, .loser-container', function () {
        const stockSymbol = $(this).attr('id');
        const url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" + stockSymbol + "&outputsize=full&apikey=Y8XIWI0EEDT64QKU";

        $.ajax({
            type: "GET",
            url: url,
            dataType: "json", // Set the dataType to "json" to parse JSON data
            success: function (data) {
                const timeSeriesDaily = data["Time Series (Daily)"];

                const formattedData = [];

                for (const date in timeSeriesDaily) {
                    const entry = timeSeriesDaily[date];
                    const timestamp = new Date(date).getTime();
                    const open = parseFloat(entry["1. open"]);
                    const high = parseFloat(entry["2. high"]);
                    const low = parseFloat(entry["3. low"]);
                    const close = parseFloat(entry["4. close"]);

                    formattedData.push([timestamp, open, high, low, close]);
                }

                // Sort the data by timestamp in ascending order
                formattedData.sort((a, b) => a[0] - b[0]);

                // Create the Highcharts chart
                const chart = document.getElementById("chart-container");
                Highcharts.stockChart(chart, {
                    rangeSelector: {
                        selected: 1
                    },
                    chart: {
                        backgroundColor: 'transparent',
                    },
                    title: {
                        text: stockSymbol
                    },
                    xAxis: {
                        type: 'datetime'
                    },
                    yAxis: {
                        title: {
                            text: 'Price'
                        }
                    },
                    plotOptions: {
                        candlestick: {
                            color: 'red',
                            upColor: 'blue',
                            lineColor: 'red',
                            upLineColor: 'green'
                        }
                    },
                    series: [{
                        type: 'candlestick',
                        name: 'Stock Price',
                        data: formattedData,
                    }]
                });
            },

            error: function () {
                console.log("Error fetching data for stock symbol:", stockSymbol);
            }
        });
    });
});
