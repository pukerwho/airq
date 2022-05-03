$('.js-analytics').on('click', function(){
  var eventCategory = $(this).data('analytics-category');
  var eventAction = $(this).data('analytics-action');
  googleAnalyticsEvent(eventCategory, eventAction);
});

function googleAnalyticsEvent(eventCategory, eventAction){
  ga('send', {
    hitType: 'event',
    eventCategory: eventCategory,
    eventAction: eventAction,
  })
}