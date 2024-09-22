$(document).ready(function () {
  // Select the table cells with the class 'status'
  $(".status").each(function () {
    var status = $(this).text().toLowerCase();

    // Add CSS styling based on the status
    if (status.includes("active")) {
      $(this).addClass("activeCss");
    } else if (status.includes("completed")) {
      $(this).addClass("completedCss");
    } else if (status.includes("in progress")) {
      $(this).addClass("inprogressCss");
    } else if (status.includes("pending")) {
      $(this).addClass("pendingCss");
    }
  });

  // Select the table cells with the class 'priority'
  $(".fa-triangle-exclamation").each(function () {
    var priorityText = $(this).parent().text().trim().toLowerCase();

    // Add CSS styling based on the priority
    if (priorityText.includes("low")) {
      $(this).addClass("fa-triangle-exclamation-green");
    } else if (priorityText.includes("medium")) {
      $(this).addClass("fa-triangle-exclamation-gold");
    } else if (priorityText.includes("high")) {
      $(this).addClass("fa-triangle-exclamation-red");
    }
  });
});

$(document).ready(function () {});
// add click event handler to check
$(".check").click(function () {
  const $this = $(this);
  const $td = $this.closest("tr").find(".td__text");
  const $tdStatus = $this.closest("tr").find(".td__text div.status");
  const taskId = $(this).closest(".dropdown").find("i").attr("data-id");

  if ($td.hasClass("strikethrough")) {
    // remove strikethrough class
    $td.removeClass("strikethrough");
    $tdStatus.removeClass("completedCss activeCss inprogressCss pendingCss");

    // restore previous text
    const previousText = $tdStatus.data("previous-text");
    $tdStatus.text(previousText);

    // add CSS class based on status text
    const status = previousText.toLowerCase();
    switch (status) {
      case "active":
        $tdStatus.addClass("activeCss");
        break;
      case "in progress":
        $tdStatus.addClass("inprogressCss");
        break;
      case "pending":
        $tdStatus.addClass("pendingCss");
        break;
    }
  } else {
    // add strikethrough class
    $td.addClass("strikethrough");
    $tdStatus.removeClass("completedCss activeCss inprogressCss pendingCss");
    $tdStatus.data("previous-text", $tdStatus.text());
    $tdStatus.text("Completed");
    $tdStatus.addClass("completedCss");
  }

  // update database
  updateTaskStatus(taskId, $tdStatus.text().toLowerCase());
});

// function to update task status in database
function updateTaskStatus(taskId, status) {
  $.ajax({
    type: "GET",
    url: "root/pages/crud/update_task.php?id=" + taskId + "&status=" + status,
    success: function (response) {
      console.log("Task status updated successfully");
    },
    error: function (xhr, status, error) {
      console.log("Error updating task status: " + error);
    },
  });
}

$(document).ready(function () {
  $(".button__addtask").click(function () {
    window.location.href = "pages/forms/add_task_form.php";
  });

  $(".dropdown").click(function () {
    $(this).find(".dropdown-content").toggle();
  });

  $(document).on("click", function (event) {
    if (!$(event.target).closest(".dropdown").length) {
      $(".dropdown-content").hide();
    }
  });

  $(".dropdown-content .edit").click(function () {
    var id = $(this).closest(".dropdown").find("i").attr("data-id");
    window.location.href = "pages/forms/update_task_form.php?id=" + id;
  });

  $(".dropdown-content .delete").click(function () {
    var id = $(this).closest(".dropdown").find("i").attr("data-id");
    window.location.href = "pages/crud/delete_task.php?id=" + id;
  });
});
