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

    $('.ImageShow').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

    // when select category the subCategory will appear that belong to Category
    $('select[name="category_id"]').on('change', function () {
        let category_id = $(this).val();
        $.ajax({
            url: url + "/subcategory/ajax",
            type: "GET",
            data: {
                category_id: category_id,
            },
            dataType: "json",
            success: function (response) {
                let result = response.data;
                let subcategoryDropdown = $('select[name="subcategory_id"]');
                subcategoryDropdown.empty();
                $.each(result, function (index, value) {
                    subcategoryDropdown.append(
                        '<option value="' + value.id + '">' + value.subcategory_name_en + '</option>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
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








})  