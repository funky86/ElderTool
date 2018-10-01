if (!String.prototype.format) {
  String.prototype.format = function() {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function(match, number) { 
      return typeof args[number] != 'undefined'
        ? args[number]
        : match
      ;
    });
  };
}

var utils = {
	dateToStr: function(date) {
		return date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
	},

	getAddedDays: function(dateStr, days) {
		var date = new Date(dateStr);
		date.setDate(date.getDate() + days);
		return utils.dateToStr(date);
	}
};