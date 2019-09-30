function dongHo(){
	var today = new Date();
	var nam = today.getFullYear();
	var thang = today.getMonth();
	var ngay = today.getDate();
	var gio = today.getHours();
	var phut = today.getMinutes();
	var giay = today.getSeconds();

	//tính theo phút
	var thoigianthi = 5;
	
	// thời gian kết thúc
	var countDownDate = new Date(nam,thang,ngay,gio,phut+thoigianthi,giay).getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

	    // Get todays date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;
	    
	    // Time calculations for days, hours, minutes and seconds
	    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	    
	    if (hours < 10)
	    {
	    	hours = "0" + hours;
	    }
	    if (minutes < 10)
	    {
	    	minutes = "0" + minutes;
	    }
	    if (seconds < 10)
	    {
	    	seconds = "0" + seconds;
	    }
	    // Output the result in an element with id="dongho"
	    document.getElementById("dongho").innerHTML = hours + ":"
	    + minutes + ":" + seconds;
	    
	    // If the count down is over, write some text 
	    if (distance < 0) {
	        clearInterval(x);
	        //document.getElementById("dongho").innerHTML = "HẾT THỜI GIAN!";
	        alert('Thời gian làm bài đã hết. Bài của bạn đã được đã nộp.');
	        //window.location = "ketqua.php";
	    }
	}, 1000);
}
