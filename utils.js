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
	},

  GetDayName: function(dateStr) {
    var date = new Date(dateStr);
    switch (date.getDay()) {
      case 0: return "Sunday";
      case 1: return "Monday";
      case 2: return "Tuesday";
      case 3: return "Wednesday";
      case 4: return "Thursday";
      case 5: return "Friday";
      case 6: return "Saturday";
      default: return "UNKNOWN";
    }
  }
};