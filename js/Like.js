(function($) {

class Like {
  constructor() {
    this.events()
  }

  events() {
    $(".like-box").on("click", this.ourClickDispatcher.bind(this))
  }

  // methods
  ourClickDispatcher(e) {
    var currentLikeBox = $(e.target).closest(".like-box")

    if (currentLikeBox.attr("data-exists") == "yes") {
      this.deleteLike(currentLikeBox)
    } else {
      this.createLike(currentLikeBox)
    }
  }

  createLike(currentLikeBox) {
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", kayremmieData.nonce)
      },
      url: kayremmieData.root_url + "/wp-json/kayremmie/v1/manageLike",
      type: "POST",
      data: { "profileId": currentLikeBox.data("profile") },
      success: response => {
        currentLikeBox.attr("data-exists", "yes")
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10)
        likeCount++
        currentLikeBox.find(".like-count").html(likeCount)
        currentLikeBox.attr("data-like", response)
        console.log(response)
      },
      error: response => {
        console.log(response)
      }
    })
  }

  deleteLike(currentLikeBox) {
    $.ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader("X-WP-Nonce", kayremmieData.nonce)
      },
      url: kayremmieData.root_url + "/wp-json/kayremmie/v1/manageLike",
      data: { "like": currentLikeBox.attr("data-like") },
      type: "DELETE",
      success: response => {
        currentLikeBox.attr("data-exists", "no")
        var likeCount = parseInt(currentLikeBox.find(".like-count").html(), 10)
        likeCount--
        currentLikeBox.find(".like-count").html(likeCount)
        currentLikeBox.attr("data-like", "")
        console.log(response)
      },
      error: response => {
        console.log(response)
      }
    })
  }
}
new Like()


/* ===============================================================
  Search / Live Overlay Results
=============================================================== */
class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML()
    this.resultsDiv = $("#search-overlay__results")
    this.openButton = $(".js-search-trigger")
    this.closeButton = $(".search-overlay__close")
    this.searchOverlay = $(".search-overlay")
    this.searchField = $("#search-term")
    this.events()
    this.isOverlayOpen = false
    this.isSpinnerVisible = false
    this.previousValue
    this.typingTimer
  }

  // 2. events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this))
    this.closeButton.on("click", this.closeOverlay.bind(this))
    $(document).on("keydown", this.keyPressDispatcher.bind(this))
    this.searchField.on("keyup", this.typingLogic.bind(this))
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.val() != this.previousValue) {
      clearTimeout(this.typingTimer)

      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>')
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750)
      } else {
        this.resultsDiv.html("")
        this.isSpinnerVisible = false
      }
    }

    this.previousValue = this.searchField.val()
  }

  getResults() {
    $.getJSON(kayremmieData.root_url + "/wp-json/kayremmie/v1/search?term=" + this.searchField.val(), results => {
      this.resultsDiv.html(`
        <div class="row">
          <div class="one-third">
            <h2 class="search-overlay__section-title">Search Results!!</h2>
            ${results.generalInfo.length ? '<ul class="link-list min-list">' : "<p>No information matches your search.</p>"}
              ${results.generalInfo.map(item => `<li><a href="${item.permalink}">${item.title}</a> ${item.postType == "post" ? `by ${item.authorName}` : ""}</li>`).join("")}
            ${results.generalInfo.length ? "</ul>" : ""}
          </div>
          <div class="one-third">
          <h2 class="search-overlay__section-title">Programs</h2>
          ${results.programs.length ? '<ul class="link-list min-list">' : `<p>No programs match that search. <a href="${universityData.root_url}/programs">View all programs</a></p>`}
            ${results.programs.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join("")}
          ${results.programs.length ? "</ul>" : ""}

        </div>
        <div class="one-third">
        <h2 class="search-overlay__section-title">Projects</h2>
        ${results.portfolios.length ? '<ul class="link-list min-list">' : `<p>No project match that search.</p>`}
          ${results.portfolios.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join("")}
        ${results.portfolios.length ? "</ul>" : ""}

        </div>
        </div>
      `)
      this.isSpinnerVisible = false
    })
  }

  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(":focus")) {
      this.openOverlay()
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay()
    }
  }

  openOverlay(e) {
    e.preventDefault()
    this.searchOverlay.addClass("search-overlay--active")
    $("body").addClass("body-no-scroll")
    this.searchField.val("")
    setTimeout(() => this.searchField.focus(), 301)
    console.log("our open method just ran!")
    this.isOverlayOpen = true
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active")
    $("body").removeClass("body-no-scroll")
    console.log("our close method just ran!")
    this.isOverlayOpen = false
  }

  addSearchHTML() {
    $("body").append(`
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>
        
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>

      </div>
    `)
  }
}

new Search()
})(jQuery)
