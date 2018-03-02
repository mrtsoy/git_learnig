var counterModule = (function () {
  var counter = 0;

  var increaseCounter = function () {
      counter++;
  }

  var getCounter = function () {
    return counter;
  }
  return {
	  increaseCounter : increaseCounter,
	  getCounter : getCounter
  }
})();dsfsd
