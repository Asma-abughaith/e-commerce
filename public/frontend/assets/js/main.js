$(function () {
    'use strict';


    const url = "http://127.0.0.1:8000";
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        let link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });


    // when select subcategory the subsubCategory will appear that belong to sub-Category
    $('select[name="subcategory_id"]').on('change', function () {
        let subcategory_id = $(this).val();
        $.ajax({
            url: url + "/sub-subcategory/ajax",
            type: "GET",
            data: {
                subcategory_id: subcategory_id,
            },
            dataType: "json",
            success: function (response) {
                let result = response.data;
                let subcategoryDropdown = $('select[name="subsubcategory_id"]');
                subcategoryDropdown.empty();
                $.each(result, function (index, value) {
                    subcategoryDropdown.append(
                        '<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.productView = function (id) {
        console.log(id)
        $.ajax({
            type: 'GET',
            url: url + '/product/view/modal/',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $('#pname').text(data.product.product_name_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pbrand').text(data.product.brand.brand_name_en);
                $('#pimage').attr('src', '/' + data.product.product_thambnail);

                $('#product_id').val(id);
                $('#qty').val(1);

                // Product Price 
                if (data.product.discount_price == null) {
                    $('#pprice').text('');
                    $('#oldprice').text('');
                    $('#pprice').text(data.product.selling_price);


                } else {
                    $('#pprice').text(data.product.discount_price);
                    $('#oldprice').text(data.product.selling_price);

                } // end prodcut price 

                // Start Stock opiton

                if (data.product.product_qty > 0) {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').text('aviable');

                } else {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#stockout').text('stockout');
                } // end Stock Option 

                // Color
                $('select[name="color"]').empty();
                $.each(data.color, function (key, value) {
                    $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                        ' </option>')
                }) // end color

                // Size
                $('select[name="size"]').empty();
                $.each(data.size, function (key, value) {
                    $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                        ' </option>')
                    if (data.size == "") {
                        $('#sizeArea').hide();
                    } else {
                        $('#sizeArea').show();
                    }

                }) // end size


            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }

        })


    }

    window.addToCart = function () {
        let product_name = $('#pname').text();
        let id = $('#product_id').val();
        let color = $('#color option:selected').text();
        let size = $('#size option:selected').text();
        let quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                id: id,
                color: color,
                size: size,
                quantity: quantity,
                product_name: product_name
            },
            url: url + "/cart/data/store/",
            success: function (data) {
                console.log(data);
                miniCart();
                $('#closeModel').click();
                // console.log(data)
                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })

                }

                // End Message 
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        })


    }

    window.miniCart = function () {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""

                $.each(response.carts, function (key, value) {
                    miniCart += `<div class="cart-item product-summary">
          <div class="row">
            <div class="col-xs-4">
              <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
            </div>
            <div class="col-xs-7">
              <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
              <div class="price"> ${value.price} * ${value.qty} </div>
            </div>
            <div class="col-xs-1 action"> 
            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
          </div>
        </div>
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>`
                });

                $('#miniCart').html(miniCart);
            }
        })

    }
    miniCart();

    window.miniCartRemove = function (rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/' + rowId,
            dataType: 'json',
            success: function (data) {
                miniCart();

                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })

                }

                // End Message 

            }
        });

    }

    window.addToWishList = function (product_id) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: url + "/add-to-wishlist/" + product_id,

            success: function (data) {

                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }

                // End Message 


            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }

        })

    }

    window.wishlist = function () {
        $.ajax({
            type: 'GET',
            url: url + '/user/get-wishlist-product',
            dataType: 'json',
            success: function (response) {

                var rows = ""
                $.each(response, function (key, value) {
                    rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thambnail} " alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                         
                        <div class="price">
                        ${value.product.discount_price == null
                            ? `${value.product.selling_price}`
                            :
                            `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                        }

                            
                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                });

                $('#wishlist').html(rows);
            }
        })

    }
    wishlist();



    ///  Wishlist remove Start 
    window.wishlistRemove = function (id) {
        $.ajax({
            type: 'GET',
            url: url + '/user/wishlist-remove/' + id,
            dataType: 'json',
            success: function (data) {
                wishlist();

                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }

                // End Message 

            }
        });

    }

    function cart() {
        $.ajax({
            type: 'GET',
            url: url + '/user/get-cart-product',
            dataType: 'json',
            success: function (response) {
                var rows = ""
                $.each(response.carts, function (key, value) {
                    console.log(value)
                    rows += `<tr>
        <td class="col-md-2"><img src="/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
        
        <td class="col-md-2">
            <div class="product-name"><a href="#">${value.name}</a></div>
             
            <div class="price"> 
                            ${value.price}
                        </div>
                    </td>


          <td class="col-md-2">
            <strong>${value.options.color} </strong> 
            </td>

         <td class="col-md-2">
          ${value.options.size == null
                            ? `<span> .... </span>`
                            :
                            `<strong>${value.options.size} </strong>`
                        }           
            </td>

           <td class="col-md-2">

           ${value.qty > 1

                            ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `

                            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
                        }
        

        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  

         <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>    
         
            </td>

             <td class="col-md-2">
            <strong>$${value.subtotal} </strong> 
            </td>

         
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                });

                $('#cartPage').html(rows);
            }
        })

    }
    cart();



    ///  Cart remove Start 
    window.cartRemove = function (id) {
        $.ajax({
            type: 'GET',
            url: url + '/user/cart-remove/' + id,
            dataType: 'json',
            success: function (data) {
                cart();
                miniCart();
                couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');

                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }

                // End Message 

            }
        });

    }

    // End Cart remove   


    // -------- CART INCREMENT --------//

    window.cartIncrement = function (rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function (data) {
                cart();
                miniCart();
                couponCalculation();
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });
    }


    // ---------- END CART INCREMENT -----///



    // -------- CART Decrement  --------//

    window.cartDecrement = function (rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function (data) {
                cart();
                miniCart();
                couponCalculation();
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });
    }

    window.applyCoupon = function () {
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                coupon_name: coupon_name
            },
            url: url + '/coupon-apply',
            success: function (data) {
                couponCalculation();
                if (data.validity == true) {
                    $('#couponField').hide();
                }

                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }

                // End Message 

            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }

        })
    }


    window.couponCalculation = function () {
        $.ajax({
            type: 'GET',
            url: url + '/coupon-calculation',
            dataType: 'json',
            success: function (data) {
                console.log(data)
                if (data.total) {
                    $('#couponCalField').html(
                        `<tr>
                <th>
                    <div class="cart-sub-total">
                        before discount<span class="inner-left-md">$ ${data.total_before}</span>
                    </div>
                    <div class="cart-sub-total">
                        discount <span class="inner-left-md">$ ${data.tax}</span>
                    </div>
                    
                    <div class="cart-grand-total">
                        Grand Total<span class="inner-left-md">$ ${data.total}</span>
                    </div>
                </th>
            </tr>`
                    )

                } else {

                    $('#couponCalField').html(
                        `<tr>
        <th>
            <div class="cart-sub-total">
                Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
            </div>
            <div class="cart-sub-total">
                Coupon<span class="inner-left-md">$ ${data.coupon_name}</span>
                <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
            </div>

             <div class="cart-sub-total">
                Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
            </div>


            <div class="cart-grand-total">
                Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
            </div>
            </th>
                </tr>`
                    )

                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }

        });
    }
    couponCalculation();

    window.couponRemove = function () {
        $.ajax({
            type: 'GET',
            url: url + '/coupon-remove',
            dataType: 'json',
            success: function (data) {
                couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');


                // Start Message 
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',

                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }

                // End Message 

            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });

    }


    $('select[name="division_id"]').on('change', function () {
        let division_id = $(this).val();
        $.ajax({
            url: url + '/district-get/ajax',
            type: "GET",
            dataType: "json",
            data: {
                division_id: division_id,
            },
            success: function (data) {
                console.log(data);
                $('select[name="state_id"]').empty();
                var d = $('select[name="district_id"]').empty();
                $('select[name="district_id"]').append('<option selected>' + "select district" + '</option>');
                $.each(data, function (key, value) {
                    $('select[name="district_id"]').append('<option value="' +
                        value.id + '">' + value.district_name + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });

    });



    $('select[name="district_id"]').on('change', function () {
        var district_id = $(this).val();

        $.ajax({
            url: url + '/state-get/ajax',
            type: "GET",
            dataType: "json",
            data: {
                district_id: district_id,
            },
            success: function (data) {
                var d = $('select[name="state_id"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="state_id"]').append('<option value="' +
                        value.id + '">' + value.state_name + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });

    });

})  