var organic_farm_Keyboard_loop = function (elem) {
  var organic_farm_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var organic_farm_firstTabbable = organic_farm_tabbable.first();
  var organic_farm_lastTabbable = organic_farm_tabbable.last();
  organic_farm_firstTabbable.focus();

  organic_farm_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      organic_farm_firstTabbable.focus();
    }
  });

  organic_farm_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      organic_farm_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};