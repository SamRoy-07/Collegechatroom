// Read Messages from the DataBase 
document.addEventListener("DOMContentLoaded", function() {
  let msgdiv = document.querySelector(".msg");

  // Function to scroll to the bottom and ensure last message is fully visible
  function scrollToBottom() {
    msgdiv.scrollTop = msgdiv.scrollHeight;
  }

  // Function to fetch messages from the server
  function fetchMessages() {
    fetch("readMsg.php")
      .then(r => {
        if (r.ok) {
          return r.text();
        }
      })
      .then(d => {
        msgdiv.innerHTML = d;
        scrollToBottom(); // Scroll to bottom after loading messages
      });
  }

  // Fetch messages when the page is loaded
  fetchMessages();

  // ADD Messages to the DataBase 
  window.onkeydown = (e) => {
    if (e.key == "Enter") {
      update();
    }
  };

  function update() {
    let msg = input_msg.value;
    input_msg.value = "";
    fetch(`addMsg.php?msg=${msg}`).then(r => {
      if (r.ok) {
        return r.text();
      }
    }).then(d => {
      console.log("msg has been added");
      fetchMessages(); // Fetch messages again after adding new message
    });
  }
});