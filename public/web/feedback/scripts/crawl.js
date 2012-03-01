// load('feedback/scripts/crawl.js')

load('steal/rhino/rhino.js')

steal('steal/html/crawl', function(){
  steal.html.crawl("feedback/feedback.html","feedback/out")
});
