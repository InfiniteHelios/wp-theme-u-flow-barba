/** animation flying text in h1 */
function sliceString(element) {
  var string = element.innerText,
    html = "";
  for (var i = 0; i < string.length; i++) {
	var ch = string.charAt(i);
	if (ch === ' ')
	  html += "<span style='width:15px;'></span>";
	else
      html += "<span>" + string.charAt(i) + "</span>";
  }
  element.innerHTML = html;
}

function animateFlyingInText(element) {
  const children = element.children,
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
  const children = element.children,
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
function h1InAnimation(container) {
	var element = container.querySelector("h1.entry-title");
	if (element) {
		sliceString(element);
		animateFlyingInText(element);
	}
}
function h1OutAnimation(container) {
	var element = container.querySelector("h1.entry-title");
	if (element) {
		console.log("ok");
		animateFlyingOutText(element);
	}
}
function menuAnimation(container) {
	var element = container.querySelector("header#masthead");
	if (element) {
		element.classList.add("once");
	}
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
		  h1OutAnimation(data.current.container);
	    },
		async leave(data) {
		  await leaveAnimation(data);
		  data.current.container.remove();
	  	},
		async beforeEnter(data) {
			var element = data.next.container.querySelector("h1.entry-title");
			sliceString(element);
		},
		async enter(data) {
			await enterAnimation(data);
			var element = data.next.container.querySelector("h1.entry-title");
			animateFlyingInText(element);
		},
		async once(data) {
			h1InAnimation(data.next.container);
			menuAnimation(data.next.container);
		}
      },
    ],
  });
});


