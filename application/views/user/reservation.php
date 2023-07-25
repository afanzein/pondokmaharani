<div class="container">
        <div class="slide-container">
            <div class="mySlides">
                <img src="/w3images/livingroom.jpg" style="width:100%;margin-bottom:-6px">
                <div class="slide-text bg-dark text-white">Living Room</div>
            </div>
            <div class="mySlides">
                <img src="/w3images/diningroom.jpg" style="width:100%;margin-bottom:-6px">
                <div class="slide-text bg-dark text-white">Dining Room</div>
            </div>
            <div class="mySlides">
                <img src="/w3images/bedroom.jpg" style="width:100%;margin-bottom:-6px">
                <div class="slide-text bg-dark text-white">Bedroom</div>
            </div>
            <div class="mySlides" style="display: block;">
                <img src="/w3images/livingroom2.jpg" style="width:100%;margin-bottom:-6px">
                <div class="slide-text bg-dark text-white">Living Room II</div>
            </div>
        </div>
        <div class="thumbnail-container">
            <div class="thumbnail" onclick="currentDiv(1)">
                <img src="/w3images/livingroom.jpg" alt="Living Room Thumbnail">
            </div>
            <div class="thumbnail" onclick="currentDiv(2)">
                <img src="/w3images/diningroom.jpg" alt="Dining Room Thumbnail">
            </div>
            <div class="thumbnail" onclick="currentDiv(3)">
                <img src="/w3images/bedroom.jpg" alt="Bedroom Thumbnail">
            </div>
            <div class="thumbnail" onclick="currentDiv(4)">
                <img src="/w3images/livingroom2.jpg" alt="Living Room II Thumbnail">
            </div>
        </div>
        <div class="detail-text">
            <p><b>Nama Pengguna :</b> John Doe</p>
            <p><b>Nama Kamar    :</b> Kamar Mewah</p>
            <p><b>Fasilitas     :</b> Wi-Fi, AC, TV, Minibar</p>
            <p><b>Harga         :</b> Rp XXX.XXX,-</p>
            <div class="date-input">
                <label for="checkInDate"><b>Check-In    : </b></label>
                <input type="date" id="checkInDate" class="form-control">
                <label for="checkOutDate"><b>Check-Out  : <b></label>
                <input type="date" id="checkOutDate" class="form-control">
            </div>
            <div class="centered-button">
            <button class="btn btn-primary">Lakukan Pemesanan</button>
        </div>
        </div>
    </div>

