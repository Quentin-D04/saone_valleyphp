
var animation = document.getElementById('successAnimation');
var restart = document.getElementById('replay');

restart.addEventListener('click', function(e) {
  e.preventDefault;
  animation.classList.remove('animated');
  void animation.parentNode.offsetWidth;
  animation.classList.add('animated');
}, false);


// const affiche = document.getElementById("condition");
// const cadre = document.querySelector(".popup");
function offre(element) {
  console.log(element);

  let condition = document.getElementById("condition_" + element);
  console.log(condition);

  if (condition.classList.contains("display_none")) {
    condition.classList.remove("display_none");
  } else {
    condition.classList.add("display_none");
  }


  let fermerElements = condition.getElementsByClassName("fermer");

  for (let i = 0; i < fermerElements.length; i++) {
    fermerElements[i].addEventListener("click", function () {
      condition.classList.add("display_none");
    });
  }
}



function voirplus(element) {
  console.log(element);
  let chalet = document.getElementById("chalet_" + element);
  console.log(chalet);

  if (chalet.classList.contains("displaynone")) {
    chalet.classList.remove("displaynone"); // Affiche la section
  } else {
    chalet.classList.add("displaynone"); // Cache la section
  }
  
}

window.onload = function () {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "<?php echo $url; ?>", true);
  xhr.send();
};



function validateDates() {
  const dateOne = document.getElementById("date_one").value;
  const dateTwo = document.getElementById("date_two").value;
  if (dateOne && dateTwo) {
    if (dateTwo < dateOne) {
      alert(
        "La date de départ doit être égale ou supérieure à la date d'arrivée."
      );
      return false;
    }
  }
  return true;
}

function filterActivities() {
  const select = document.getElementById("typeFilter");
  const selectedType = select.value;
  const rows = document.querySelectorAll(".activity-row");

  rows.forEach(function (row) {
    const typeCell = row.querySelector(".activity-type");
    if (selectedType === "all") {
      row.style.backgroundColor = "";
    } else if (typeCell.textContent === selectedType) {
      row.style.backgroundColor = "var(--secondary)";
    } else {
      row.style.backgroundColor = "";
    }
  });
}
