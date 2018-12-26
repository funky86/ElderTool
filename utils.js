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
  YEAR_MILLISECONDS: 30758400000,
  DAY_MILLISECONDS: 86400000,

	dateToStr: function(date) {
		return date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate();
	},

  dateToStrFull: function(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    return "{0}-{1}-{2} {3}:{4}:{5}".format(year, month, day, hours, minutes, seconds);
  },

	getAddedDaysStr: function(dateStr, days) {
		var date = new Date(dateStr);
		date.setDate(date.getDate() + days);
		return utils.dateToStr(date);
	},

  getDayName: function(dateStr) {
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
  },

  getRandomInt: function(max) {
    return Math.floor(Math.random() * max);
  },

  getRandomIntMinMax: function(min, max) {
    return min + Math.floor(Math.random() * (max - min));
  }
};