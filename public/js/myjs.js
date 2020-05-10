    // init controller
var controller = new ScrollMagic.Controller();

// create a scene
var sceneOne = new ScrollMagic.Scene({
    triggerElement: "#trigger2",
    triggerHook: 0.9,
    offset: 50, // move trigger to center of element
    reverse: false // only do once
})
.setClassToggle("#reveal2", "visible") // add class toggle
.addTo(controller);

var sceneTwo = new ScrollMagic.Scene({
    triggerElement: "#trigger1",
    triggerHook: 0.8, // show, when scrolled 10% into view
    duration: "80%", // hide 10% before exiting view (80% + 10% from bottom)
    offset: 700 // move trigger to center of element
})
.setClassToggle("#reveal1", "visible") // add class to reveal
// .addIndicators() // add indicators (requires plugin)
.addTo(controller);

var sceneTwo = new ScrollMagic.Scene({
    triggerElement: "#trigger3",
    triggerHook: 0.2, // show, when scrolled 10% into view
    duration: "80%", // hide 10% before exiting view (80% + 10% from bottom)
    offset: 0 // move trigger to center of element
})
.setClassToggle("#reveal3", "visible") // add class to reveal
// .addIndicators() // add indicators (requires plugin)
.addTo(controller);

var sceneTwo = new ScrollMagic.Scene({
    triggerElement: "#trigger4",
    triggerHook: .5, // show, when scrolled 10% into view
    duration: "80%", // hide 10% before exiting view (80% + 10% from bottom)
    offset: 1200 // move trigger to center of element
})
.setClassToggle("#reveal4", "visible") // add class to reveal
// .addIndicators() // add indicators (requires plugin)
.addTo(controller);


