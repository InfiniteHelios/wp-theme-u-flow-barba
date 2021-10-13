/* color line transition */
function prepareColorLineTransition(prev, next) {
	var prevImageContainer = prev.querySelector(".grueten-container");
	if (!prevImageContainer) return;
	var prevImage = prevImageContainer.querySelector("img:last-child");
	if (!prevImage) return;
	var nextImageContainer = next.querySelector(".grueten-container");
	if (!nextImageContainer) return;
	var nextImage = nextImageContainer.lastElementChild;
	if (!nextImage) return;
	prevImage.classList.add("gruenten");
	prevImage.classList.remove("color-line-image");
	nextImage.classList.remove("gruenten");
	nextImage.classList.add("color-line-image");
	nextImage.style.visibility = "visible";
	nextImage.style.width = nextImageContainer.offsetWidth + "px";
	prevImage.style.width = nextImage.style.width;
	var html = prevImage.outerHTML + '<div class="color-line-mask">' + nextImage.outerHTML + '</div>';
	nextImageContainer.innerHTML = html;
}

/* handle scroll animation */
function handleScrollAnimationInContainer(container) {
	const scrollElements = container.querySelectorAll(".js-scroll");

	const elementInView = (el, dividend = 1) => {
	  const elementTop = el.getBoundingClientRect().top;

	  return (
		elementTop <=
		(window.innerHeight || container.documentElement.clientHeight) / dividend
	  );
	};

	const elementOutofView = (el) => {
	  const elementTop = el.getBoundingClientRect().top;

	  return (
		elementTop > (window.innerHeight || container.documentElement.clientHeight)
	  );
	};

	const displayScrollElement = (element) => {
	  element.classList.add("scrolled");
	};

	const hideScrollElement = (element) => {
	  element.classList.remove("scrolled");
	};

	const handleScrollAnimation = () => {
	  scrollElements.forEach((el) => {
		if (elementInView(el, 1.25)) {
		  displayScrollElement(el);
		} else if (elementOutofView(el)) {
		  hideScrollElement(el)
		}
	  })
	}

	window.addEventListener("scroll", () => { 
	  handleScrollAnimation();
	});
}

/** animation flying text */
function sliceString(element) {
	var string = element.innerText,
		html = "<div style='display: inline-block;'>";
	for (var i = 0; i < string.length; i++) {
		var ch = string.charAt(i);
		if (ch === ' ')
			html += "<span style='width:15px;'>&nbsp;</span></div><div style='display: inline-block;'>";
		else
			html += "<span class='fly-span'>" + string.charAt(i) + "</span>";
	}
	html += "</div>";
	if (element.childElementCount) {
		for (child = element.firstChild; child; child = child.nextSibling) {
			if (child.nodeType == Node.ELEMENT_NODE) {
				html += child.outerHTML;
			}
		}
	}
  	element.innerHTML = html;
}

function animateFlyingInText(element) {
  const children = element.querySelectorAll('span.fly-span'),
    childCount = children.length;
  var counter = 0;

  function animateRandomChild() {
    var child;
    while (true) {
      child = children[Math.floor(Math.random() * childCount)];
      if (!child.classList.contains("in")) {
        child.classList.add("in");
        counter++;
        break;
      }
    }
    if (counter < childCount) setTimeout(animateRandomChild, 25);
  }

  animateRandomChild();
}

function animateFlyingOutText(element) {
  const children = element.querySelectorAll('span.fly-span'),
    childCount = children.length;
  var counter = 0;

  function animateRandomChild() {
    var child;
    while (true) {
      child = children[Math.floor(Math.random() * childCount)];
	  child.classList.remove("in");
      if (!child.classList.contains("out")) {
        child.classList.add("out");
        counter++;
        break;
      }
    }
    if (counter < childCount) setTimeout(animateRandomChild, 25);
  }

  animateRandomChild();
}

/** transition between pages with barba.js and gsap */
function leaveAnimation(data) {
	return gsap.to(data.current.container, { duration:0.5, opacity: 1 });
}
function enterAnimation(data) {
	return gsap.from(data.next.container, { duration: 0.5, opacity: 1 });
}
function menuAnimation(container) {
	var element = container.querySelector("header#masthead");
	if (element) {
		element.classList.add("once");
	}
}
function paraFlyInAnimation(container) {
	var elements = container.querySelectorAll('.fly-ani');
	elements.forEach(function(ele) { sliceString(ele); animateFlyingInText(ele); });
}
function paraFlyOutAnimation(container) {
	var elements = container.querySelectorAll('.fly-ani');
	elements.forEach(function(ele) { animateFlyingOutText(ele); });
}
function prepareFlyInAnimation(container) {
	var elements = container.querySelectorAll('.fly-ani');
	elements.forEach(function(ele) { sliceString(ele); });
}
function startFlyInAnimation(container) {
	var elements = container.querySelectorAll('.fly-ani');
	elements.forEach(function(ele) { animateFlyingInText(ele); });
}

/* video background responsive */
function fitVideoBackground(vid_w_orig, vid_h_orig) {
	var videoOutline = document.querySelector('.fullsize-video-bg');
	if (!videoOutline) return;
	var videoViewport = videoOutline.querySelector('.video-viewport');
	if (!videoViewport) return;
	var videoContainer = videoViewport.querySelector('video');
	
	videoViewport.offsetWidth = videoOutline.offsetWidth;
	videoViewport.offsetHeight = videoOutline.offsetHeight;
	
	var min_w = 300;
    var scale_h = videoOutline.offsetWidth / vid_w_orig;
    var scale_v = videoOutline.offsetHeight / vid_h_orig;
    var scale = scale_h > scale_v ? scale_h : scale_v;

    if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;};

	videoContainer.offsetWidth = scale * vid_w_orig;
	videoContainer.offsetHeight = scale * vid_h_orig;

	videoViewport.scrollLeft = videoContainer.offsetWidth - videoOutline.offsetWidth/2;
	videoViewport.scrollTop = videoContainer.offsetHeight - videoOutline.offsetHeight/2;
};
function initEventVideoBackground() {
	var videoContainer = document.querySelector('.fullsize-video-bg .video-viewport video');
	if (!videoContainer) return;
    var vid_w_orig = parseInt(videoContainer.width);
    var vid_h_orig = parseInt(videoContainer.height);

	window.addEventListener('resize', function(event) {
		fitVideoBackground(vid_w_orig, vid_h_orig);
	}, true);

}

/** dom ready */
document.addEventListener("DOMContentLoaded", function () {
  barba.init({
    transitions: [
      {
		async beforeLeave(data) {
		  var element = data.current.container.querySelector("main header img");
		  if (element) {
		  	element.classList.add("leave");
	  	  }
		  paraFlyOutAnimation(data.current.container);
	    },
		async leave(data) {
		  await leaveAnimation(data);
		  data.current.container.remove();
	  	},
		async beforeEnter(data) {
			prepareFlyInAnimation(data.next.container);
			element = data.next.container.querySelector(".fullsize-video-bg .video-viewport video");
			if (element) element.play();
			prepareColorLineTransition(data.current.container, data.next.container);
		},
		async enter(data) {
			await enterAnimation(data);
			startFlyInAnimation(data.next.container);
			handleScrollAnimationInContainer(data.next.container);
		TweenMax.from(".color-line-mask", 2.5, { width: "0px", ease: Power0.easeNone });

		},
		async once(data) {
			paraFlyInAnimation(data.next.container);
			menuAnimation(data.next.container);
			handleScrollAnimationInContainer(data.next.container);
		}
      },
    ],
  });
	
  initEventVideoBackground();
});


