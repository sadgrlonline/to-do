// Yay, Javascript! Just kidding...

$(function() {

    function addListItem(item) {
        var newItem = `<li> ${item} </li>`;
        return newItem;
      }
      
      function addCategory(cat) {
        var newCat = `<details><summary> ${cat} </summary>`;
        return newCat;
      
      }

// this controls what happens when someone clicks the '+' button
$('.addItem').on("click", function(event) {
  //event.preventDefault();
  var category = $(this).parent().children('summary').text();
  var textInput = `<input type="text" name="${category}" class="textInput">`;
  $(this).parent().children('ul').append(textInput);
  $(this).hide();
  //console.log($(this));
  // do something
});

// this controls what happens when someone clicks the 'newcat' button
$('#newCategory').on("click", function(event) {
    // create a new category or w/e
    var newCat = `<input type="text" name="newCat" id="newCat" placeholder="category title">`;
    $(this).parent().prepend(newCat);
});

// double-clicking permanently deletes an item from the db
// might change how this works idk
$(document).ready(function() {
$(document).on('dblclick', 'li', function(event) {
  console.log($(this).attr("class"));
   var id = $(this).attr("class");
  $.ajax({
    type: 'post',
    data: {'id': id},
    url: 'logic.php',
    success: function(data) {
    console.log('success');
    }
//e.preventDefault();
});
  $(this).remove();
  // use ajax to send data to php to delete
}) 
})

// single-clicking marks an item as 'done' and moves it to the 'completed' category
$(document).ready(function() {
  $(document).on('click', 'li', function(event) {
    console.log($(this).attr("class"));
     var updateId = $(this).attr("class");
    $.ajax({
      type: 'post',
      data: {'updateId': updateId},
      url: 'logic.php',
      success: function(data) {
      console.log('success');
      }
  //e.preventDefault();
  });
    $(this).remove();
    // use ajax to send data to php to delete
  }) 
  })
  

//$(document).ready(function() {
//$(document).on('click', 'li', function(event) {
//    $('#description').css("display", "block");
//    var myClass = $(this).attr("class");
//    console.log(myClass);
//    console.log('#id' + myClass);
//    $('#id' + myClass).css("display", "block");
//}) 
//})

$('.close').on("click", function(event) {
    //var myClass = $(this).attr("class");
    $('#description').css("display", "none");
    //$('#' + myClass).css("display", "none");
})

$(document).ready(function() {
    $(document).on('keydown', '#newCat', function(e) {
        //e.preventDefault();
          if(e.keyCode == 13) {
            var category = $(this).val();
            $(this).parent().append(addCategory($(this).val()));
            $(this).hide();
            $.ajax({
                type: 'post',
                data: {'category': category},
                url: 'logic.php',
                success: function(data) {
                console.log('success');
                }
            //e.preventDefault();
    });
    }
    });
});


// when enter is pressed in an input
$(document).ready(function() {
$(document).on('keydown', '.textInput', function(e) {
    //e.preventDefault();
      if(e.keyCode == 13) {
        
        $(this).parent().append(addListItem($(this).val()));
        $('.addItem').show();
        var item = $(this).val();
        var category = $(this).attr('name');
        console.log('category is...' + category);
        console.log('item is..' + item);
        console.log('testttt');
        $(this).hide();
		$.ajax({
			type: 'post',
            data: {'item': item,
                'category': category},
			url: 'logic.php',
			success: function(data) {
			console.log('success');
			}
        //e.preventDefault();
});
}
});



});
});