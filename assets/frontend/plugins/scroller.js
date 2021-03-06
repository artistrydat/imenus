// duration of scroll animation
var scrollDuration = 300;
// paddles
var leftPaddle = document.getElementsByClassName('arrow-left');
var rightPaddle = document.getElementsByClassName('arrow-right');
// get items dimensions
var itemsLength = $('.item').length;
var itemSize = $('.item').outerWidth(true);
// get some relevant size for the paddle triggering point
var paddleMargin = 20;

// get wrapper width
var getMenuWrapperSize = function() {
  return $('.item-wrapper').outerWidth();
}
var menuWrapperSize = getMenuWrapperSize();
// the wrapper is responsive
$(window).on('resize', function() {
  menuWrapperSize = getMenuWrapperSize();
});
// size of the visible part of the menu is equal as the wrapper size 
var menuVisibleSize = menuWrapperSize;

// get total width of all menu items
var getMenuSize = function() {
  return itemsLength * itemSize;
};
var menuSize = getMenuSize();
// get how much of menu is invisible
var menuInvisibleSize = menuSize - menuWrapperSize;

// get how much have we scrolled to the left
var getMenuPosition = function() {
  return $('.itemList').scrollLeft();
};

// finally, what happens when we are actually scrolling the menu
$('.itemList').on('scroll', function() {

  // get how much of menu is invisible
  menuInvisibleSize = menuSize - menuWrapperSize;
  // get how much have we scrolled so far
  var menuPosition = getMenuPosition();

  var menuEndOffset = menuInvisibleSize - paddleMargin;

  // show & hide the paddles 
  // depending on scroll position
  // if (menuPosition <= paddleMargin) {
  //   $(leftPaddle).addClass('hidden');
  //   $(rightPaddle).removeClass('hidden');
  // } else if (menuPosition < menuEndOffset) {
  //   // show both paddles in the middle
  //   $(leftPaddle).removeClass('hidden');
  //   $(rightPaddle).removeClass('hidden');
  // } else if (menuPosition >= menuEndOffset) {
  //   $(leftPaddle).removeClass('hidden');
  //   $(rightPaddle).addClass('hidden');
  // }

  // print important values
  $('#print-wrapper-size span').text(menuWrapperSize);
  $('#print-menu-size span').text(menuSize);
  $('#print-menu-invisible-size span').text(menuInvisibleSize);
  $('#print-menu-position span').text(menuPosition);

});

// scroll to left
$(rightPaddle).on('click', function() {
  $('.itemList').animate({
    scrollLeft: getMenuPosition() + 100
  }, scrollDuration);
});

// scroll to right
$(leftPaddle).on('click', function() {

  $('.itemList').animate({
    scrollLeft: getMenuPosition() - 100
  }, scrollDuration);
});