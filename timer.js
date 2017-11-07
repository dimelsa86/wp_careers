var val = 0;
var old_date = 0;
var d = new Date();
var time = d.getTime()

var oldTime = '11/3/2017 11:41:40'
var old = Date.parse(oldTime)
var t = Math.floor((time - old)/1000);
console.log(t);

