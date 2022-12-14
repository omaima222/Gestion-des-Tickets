<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div id="">
        <h1>E-Tickets Details</h1>
        <div class="matchTicketDetails d-flex">
            <img style="width:18rem; height:10rem;" src="../assets/images/match/{{image}}" alt="match">
            <div class="details1 mx-5">
                <h3>{{Team1}} vs {{Team2}}</h3>
                <h4 ><img style="width: 1.2rem;  margin-right: 1rem;" src="Location-Icon-by-arus-2.jpg" alt=""> {{stadium}}</h4>
                <h4 ><img style="width: 1.2rem;  margin-right: 1rem;" src="calendar-icon-vector-flat-symbol-illustration-164304880.jpg" alt=""> {{date}}</h4>
            </div>

        </div>
        <section class="orderSummery">
            <div class="ticketDetails">
                <h2>Order Summary</h2>            
                <div class="details">
                    <h4>Ticket type</h4>
                    <h4 class="dtl">_</h4>
                </div>
            </div>
            <div class="ticketDetails">
                <div class="details">
                    <h4>Ticket price</h4>
                    <h4 class="dtl">{{price}}$</h4>
                </div>
                <div class="details">
                    <h4>Service and Handling</h4>
                    <h4 class="dtl">_</h4>
                </div>
                <div class="details">
                    <h4>Admin fee</h4>
                    <h4 class="dtl">_</h4>
                </div> 
            </div>
            <div class="">           
                <div class="details">
                    <h4 class="">Total</h4>
                    <h4 class="dtl">{{price}}$</h4>
                </div>
            </div>
        </section>
    </div>
    
</body>
</html>