var vacancylist = null;
var uplPath = BASE_URL+'flights';
$('#rqmode').val('docready');

$('form#flightfilter').trigger("reset");

$('#table-scalatel').removeClass('hidden');
$('#flighttable').on('init.dt', function () {
    $('#table-scalatel').addClass('hidden');
    $("#table-div").removeClass('invisible').show();
});



$('#requestDate').on('change', function () { changeState(); vacancylist.draw(); });
$('#deptime').on('change', function () { changeState(); vacancylist.draw(); });
$('#arrtime').on('change', function () { changeState(); vacancylist.draw(); });
$('#origin').on('change', function () { changeState(); vacancylist.draw(); });
$('#deperture').on('change', function () { changeState(); vacancylist.draw(); });
$('#change').on('change', function () { changeState(); vacancylist.draw(); });
$('#connect').on('keyup', function () { changeState(); vacancylist.draw(); });

function changeState(){
    $('#rqmode').val('filter');
}

vacancylist = $('#flighttable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: {
        url: uplPath,
        data: function (d) {

            d.requestDate = $('#requestDate').val();
            d.deptime = $('#deptime').val();
            d.arrtime = $('#arrtime').val();
            d.origin = $('#origin').val();
            d.deperture = $('#deperture').val();
            d.change = $('#change').val();
            d.connect = $('#connect').val();
            d.state = $('#rqmode').val();
        },
    },
    columns: [{
        data: 'requestDate',
        name: 'requestDate'
    },
    {
        data: 'leg',
        name: 'leg'
    },
    {
        data: 'flightNo',
        name: 'flightNo'
    },
    {
        data: 'origin',
        name: 'origin'
    },
    {
        data: 'deperture',
        name: 'deperture'
    },
    {
        data: 'deptime',
        name: 'deptime'
    },
    {
        data: 'arrtime',
        name: 'arrtime'
    },
    {
        data: 'ftime',
        name: 'ftime'
    },
    {
        data: 'equipment',
        name: 'equipment'
    },
    {
        data: 'change',
        name: 'change'
    },
    {
        data: 'connect',
        name: 'connect'
    },
    {
        data: null,
        render: function (data) {
            return `<div class="flex justify-end item-center">
                            <a href="${BASE_URL}flights/${data.id}/edit" class="bg-green-400 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-400 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deletevacancy(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
        }
    }
    ]
}).columns.adjust().responsive.recalc();


// Deleting Vacancy
function deletevacancy(vacID) {
    Swal.fire({
        title: "Delete ?",
        text: "Are you sure to delete this Job ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Delete",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: 'DELETE',
                url: BASE_URL + 'flights/' + vacID,
                success: function (response) {
                    if (response.status == "success") {
                        Swal.fire('Success!', response.message, 'success');
                        vacancylist.draw();
                    } else if (response.status == "error") {
                        Swal.fire('This item is not deletable!', response.message, 'error');
                        vacancylist.draw();
                    }
                }
            });
        }
    });
}
