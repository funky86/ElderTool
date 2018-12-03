var mainControllerHelper = {
	readStockValues: function(seriesSrc, dateStr) {
		var dateMs = new Date(dateStr).getTime();
		var series = [];
		for (var key in seriesSrc) {
			timeMs = new Date(key).getTime();
			if (timeMs > dateMs) {
				var valuesSrc = seriesSrc[key];

				var values = {};
				values["date"] = key;
				values["open"] = parseFloat(valuesSrc["1. open"]);
				values["high"] = parseFloat(valuesSrc["2. high"]);
				values["low"] = parseFloat(valuesSrc["3. low"]);
				values["close"] = parseFloat(valuesSrc["4. close"]);
				values["volume"] = parseFloat(valuesSrc["5. volume"]);

				series.push(values);
			} else {
				break;
			}
		}
		return series;
	}
};