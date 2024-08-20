jQuery(document).ready(function ($) {
  new WOW().init();
  AnimationText();
  
});
AnimationText = () => {
  jQuery(".nkd_title.animation").textillate({
    in: { effect: "bounceIn", shuffle: false, reverse: false, sync: false },
    out: { effect: "bounceOut", shuffle: false, reverse: false, sync: false },
    loop: true,
  });
};
