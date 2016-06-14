// https://github.com/filamentgroup/font-loading
(function(w){

  if(w.document.documentElement.className.indexOf('fonts-loaded') > -1){
    return;
  }

  var fontA = new w.FontFaceObserver(''),
      fontB = new w.FontFaceObserver(''),
      fontC = new w.FontFaceObserver('');

  w.Promise
    .all([fontA.check(), fontB.check(), fontC.check()])
    .then(function(){
      w.document.documentElement.className += ' ffo-loaded';
    });

}(this));
