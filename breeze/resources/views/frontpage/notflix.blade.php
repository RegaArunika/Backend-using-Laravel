
<x-home-layout>
    <body class="flex flex-col items-center justify-center bg-gray-100 p-6">

        <h2 class="text-center pt-10 text-3xl font-bold tracking-tight text-gray-900">
            <span class="text-purple-700">NIKE</span>
        </h2>
        
        <div class="max-w-3xl mx-10 mt-10 bg-white rounded-lg overflow-hidden p-6 w-full flex ">
            <div class="w-1/2 pr-6">
                <div class="relative group">
                    <img src="{{ asset('images/shoes1.jpg') }}" class="w-full h-auto object-cover rounded-lg transform transition duration-500 ease-in-out group-hover:scale-110" alt="Product Image">
                </div>
            </div>
            <div class="w-1/2">
                <h1 class="font-bold text-purple-700 py-2">Nike Court Shoes</h1>
                <h3 class="py-2 text-xl font-bold">Rp. 550.000</h3>
                <p class="mb-2 mt-2">
                    <strong>Deskripsi Detail:</strong> Menghormati sejarah yang berakar dalam budaya tenis, Nike Court Legacy membawa Anda kehadiran produk yang telah diuji waktu. Bagian atasnya yang berkerut, jahitan warisan, dan desain Swoosh retro memungkinkan Anda menyatukan gaya olahraga dan mode. Dan, Anda bisa berbuat baik dengan terlihat baik.
                </p>
                <div class="pt-2 flex items-center">
                    <label for="sizeSelect" class="mr-2">Size:</label>
                    <select id="sizeSelect" class="bg-gray-100 border rounded-lg px-2 py-1">
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                    </select>
                </div>
                <div class="pt-2 flex items-center">
                    <label for="quantityInput" class="mr-2">Quantity:</label>
                    <input type="number" id="quantityInput" class="bg-gray-100 border rounded-lg px-2 py-1" value="1" min="1">
                </div>
                <div class="pt-5 flex justify-around">
                    <button class="border border-black px-4 h-10 rounded-lg" id="addToCartButton">Add To Cart</button>
                </div>
            </div>
        </div>
        
        <div class="mt-8 px-10">
            <div class="flex items-center bg-gray-200 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2 mr-2" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                <h3 class="text-xl font-bold text-center">Keranjang Anda</h3>
            </div>
        
            <div id="cartContainer" style="display: none;" class="w-full mt-8 px-10">
                <div class="cart-item flex items-center mb-4 lg:w-1/2 justify-center">
                    <img src="{{ asset('images/shoes1.jpg') }}" class="w-20 h-auto object-cover rounded-lg mr-4" alt="Product Image">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-bold text-purple-700">Nike Court Shoes</p>
                                <p class="text-gray-600">Size: <span id="cartItemSize">41</span></p>
                            </div>
                            <p class="text-purple-700">Rp. <span id="cartItemPrice">550,000</span></p>
                        </div>
                        <div class=" items-center mt-2 block">
                            <p class="mr-2">Quantity: <span id="cartItemQuantity">1</span></p>
                            <p class="mr-2">Total: Rp. <span id="cartItemTotal">550,000</span></p>
                        </div>
                        <button onclick="confirmOrder()" class="bg-purple-700 text-white px-4 py-2 mt-4 rounded-md">Pesan</button>
                        <button onclick="removeFromCart()" class="bg-red-500 text-white px-4 py-2 mt-4 rounded-md">Hapus</button>
                    </div>
                </div>
            </div>
        
            <div id="confirmationModal" style="display: none;" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-8 rounded-md">
                    <p class="text-lg font-bold mb-4">Konfirmasi Pesanan</p>
                    <p>Apakah Anda yakin ingin memesan Nike Court Shoes?</p>
                    <div class="flex justify-end mt-4">
                        <button id="yesButton" class="bg-purple-700 text-white px-4 py-2 mr-4 rounded-md">Ya</button>
                        <button id="noButton" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tidak</button>
                    </div>
                </div>
            </div>
            
        </div>
        

      
      <section id='review' class="pt-36">
        <div class="border-t-2 border-gray-200 mt-6 pt-6 flex">
            <div class="w-full" id="reviewList"> <!-- This division will take the remaining width -->
                <!-- Review content will appear here -->
            </div>
            <div class="w-1/3 p-6" id="reviewFormContainer"> <!-- Right side taking 1/3rd of the width -->
                <h3 class="text-xl font-bold mb-4">Form Review</h3>
                <form id="reviewForm" class="mb-4">
                    <div class="mb-4">
                        <label for="userName" class="block text-gray-700 font-bold mb-2">Nama:</label>
                        <input type="text" id="userName" name="userName" class="block px-4 py-2 rounded-lg text-gray-700 border focus:border-indigo-500 focus:outline-none" placeholder="Nama" required>
                    </div>
                    <div class="mb-4">
                        <label for="userRating" class="block text-gray-700 font-bold mb-2">Rating:</label>
                        <div id="ratingStars" class="flex items-center mb-2">
                            <span class="text-2xl cursor-pointer" data-rating="1">★</span>
                            <span class="text-2xl cursor-pointer" data-rating="2">★</span>
                            <span class="text-2xl cursor-pointer" data-rating="3">★</span>
                            <span class="text-2xl cursor-pointer" data-rating="4">★</span>
                            <span class="text-2xl cursor-pointer" data-rating="5">★</span>
                        </div>
                        <input type="hidden" id="userRating" name="userRating" required>
                    </div>
                    <div class="mb-4">
                        <label for="userReview" class="block text-gray-700 font-bold mb-2">Review:</label>
                        <textarea id="userReview" name="userReview" class="block px-4 py-2 rounded-lg text-gray-700 border focus:border-indigo-500 focus:outline-none" rows="4" placeholder="Tambahkan review" required></textarea>
                    </div>
                    <button type="submit" class="bg-purple-700 hover:bg-purple-500 px-6 h-10 rounded-lg text-white">Submit Review</button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        //vuejs

        //end vue


        //modal
         $(document).ready(function() {
        $(document).on('click', '#confirmOrderButton', function() {
            $('#confirmationModal').css('display', 'flex');
        });

        $('#yesButton').on('click', function() {
            // Handle konfirmasi pesanan jika diperlukan
            alert('Pesanan berhasil ditempatkan!');
            
            // Ganti tampilan setelah memesan
            window.location.href = '/notflix';
            
            // Sembunyikan modal
            $('#confirmationModal').css('display', 'none');
        });

        $('#noButton').on('click', function() {
            // Sembunyikan modal jika tombol "Tidak" ditekan
            $('#confirmationModal').css('display', 'none');
        });
    });
        $(document).ready(function () {
            // rating dengan bintang
            $('#ratingStars span').on('click', function () {
                const rating = $(this).data('rating');
                $('#userRating').val(rating);
    
                $('#ratingStars span').each(function (index) {
                    if (index < rating) {
                        $(this).text('★');
                    } else {
                        $(this).text('☆');
                    }
                });
            });
    
            $('#reviewForm').on('submit', function (event) {
                event.preventDefault();
                const userName = $('#userName').val();
                const userRating = $('#userRating').val();
                const userReview = $('#userReview').val();
    
                const reviewList = $('#reviewList');
                const reviewContent = $('<div>').addClass('bg-gray-50 p-4 rounded-lg mb-4 text-center');
    
                const userProfile = $('<div>').addClass('flex flex-col items-center mb-2');
    
                const totalReviews = $('#reviewList > div').length;
    
                // foto
                const userAvatar = $('<img>').addClass('w-8 h-8 rounded-full mb-2');
    
                // gambar
                const randomEmail = Math.random().toString(36).substring(2) + "@example.com";
                const gravatarURL = `https://www.gravatar.com/avatar/${randomEmail}?d=identicon`;
    
                userAvatar.attr('src', gravatarURL);
                userProfile.append(userAvatar);
    
                // Nama
                const userNameElement = $('<p>').addClass('font-bold').text(userName);
                userProfile.append(userNameElement);
    
                reviewContent.append(userProfile);
    
                // Rating
                const userRatingElement = $('<div>').addClass('flex items-center justify-center mb-2');
                const ratingText = $('<p>');
    
                for (let i = 1; i <= 5; i++) {
                    const star = $('<span>').addClass('text-2xl');
                    if (i <= userRating) {
                        star.text('★');
                    } else {
                        star.text('☆');
                    }
                    ratingText.append(star);
                }
    
                userRatingElement.append(ratingText);
                reviewContent.append(userRatingElement);
    
                const reviewText = $('<p>').addClass('text-gray-700').text(userReview);
                reviewContent.append(reviewText);
    
                reviewList.append(reviewContent);
    
                // reset form
                $('#userName').val('');
                $('#userRating').val('');
                $('#ratingStars span').text('☆');
                $('#userReview').val('');
            });
            
            
        //cart
        $('#addToCartButton').on('click', function () {
            const productName = "Nike Court Shoes";
            const productPrice = 550000;
            const productImage = "{{ asset('images/shoes1.jpg') }}";
            const selectedSize = $('#sizeSelect').val();
            const quantity = $('#quantityInput').val();

            const itemControls = $('<div>').append(decrementButton, itemQuantity, incrementButton, removeButton);
            const itemDetails = $('<div>').append(itemName, itemPrice, itemControls, itemSize);
            const cartItem = $('<div>').append(itemImage, itemDetails);

            $('#cartContainer').append(cartItem).show();
            updateTotalHarga();
            
        });


        $('#sizeSelect').on('change', function () {
        const selectedSize = $(this).val();
        $('.cartItem .itemSize').text('Size: ' + selectedSize);
        });

    });

    $('#pesanButton').on('click', function () {
    // Get the selected size and quantity
    var selectedSize = $('#sizeSelect').val();
    var selectedQuantity = $('#quantityInput').val();

    // Update the cart item details
    $('#cartItemSize').text(selectedSize);
    $('#cartItemQuantity').text(selectedQuantity);
    $('#cartItemTotal').text(550000 * selectedQuantity); // Assuming the price is fixed

    // Show the cart container
    $('#cartContainer').css('display', 'block');
    });

    $('#addToCartButton').on('click', function () {
    // Get the selected size and quantity
    var selectedSize = $('#sizeSelect').val();
    var selectedQuantity = $('#quantityInput').val();

    // Update the cart item details
    $('#cartItemSize').text(selectedSize);
    $('#cartItemQuantity').text(selectedQuantity);
    $('#cartItemTotal').text(550000 * selectedQuantity); // Assuming the price is fixed

    // Show the cart container
    $('#cartContainer').css('display', 'block');
    });
    
    //konfirm
    function confirmOrder() {
        // Tampilkan modal konfirmasi pesanan
        document.getElementById('confirmationModal').style.display = 'flex';
    }

    function placeOrder() {
        // Implementasikan logika penyimpanan pesanan di sini
        alert('Pesanan berhasil ditempatkan!');
        closeModal();
    }

    function closeModal() {
        // Tutup modal konfirmasi pesanan
        document.getElementById('confirmationModal').style.display = 'none';
    }

    //remove
    function removeFromCart() {
        // Implementasikan logika penghapusan item dari keranjang di sini
        alert('Item berhasil dihapus dari keranjang!');
        
        // Sembunyikan item dari keranjang
        $('#cartContainer').css('display', 'none');
    }
    </script>
    </body>
  </x-home-layout>
  