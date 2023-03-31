function placeBetByUser (game)
{
    const gameDetails = JSON.parse(game)
    $('#title').html(gameDetails.frst_team.name+' Vs '+gameDetails.second_team.name)
    $('#escrow_fee').html(gameDetails.escrow_fee)
    const data = moment(gameDetails.game_date).format('MMMM Do YYYY, h:mm:ss')
    $('#date').html(data)
    $('.categories_id').val(gameDetails.category_id)
    $('.leagues_id').val(gameDetails.league_id)
    $('.games_id').val(gameDetails.id)
    $('.game_date').val(gameDetails.game_date)
    $('#betpop-up').modal('show');
}

function pullOutTransModal (trans)
{
    const transDetails = JSON.parse(trans)
    $('#refrence').html(transDetails.reference)
    const data = moment(transDetails.created_at).format('MMMM Do YYYY, h:mm:ss')
    $('#trans_date').html(data)
    $('#trans_mode').html(transDetails.mode)
    $('#trans_type').html(transDetails.type)
    $('#trans_amt').html(transDetails.amount)
    $('#trans_remark').html(transDetails.ramarks)
    $('#trans-up').modal('show');
}

$('#placeBet').click(function(e) {
    e.preventDefault();
    const button = $(this);
    const betOption = $('input[name="bet_option"]:checked').val();
    const amount = $('input[name="amount"]').val();
    const categoriesId = $('input[name="categories"]').val();
    const leaguesId = $('input[name="leagues"]').val();
    const gamesId = $('input[name="games"]').val();
    const userId = $('input[name="users"]').val();
    const game_date = $('input[name="game_date"]').val();

    button.prop('disabled', true)
    button.text('Please Wait....')

    const dataValue = {
        betOption, amount, categoriesId, leaguesId, gamesId, userId, game_date
    }
    const url = 'http://127.0.0.1:8000/api/place-bet';
    $.post(url, dataValue, function(data, status){
        if(status !== 'success')
        {
            $.Toast('Error', data.message, 'error', {
                position_class: "toast-top-right",
                has_progress: true,
                has_icon: false,
            })
            return;
        }
        button.prop('disabled', false)
        button.text('Place Bet')
        $('#betpop-up').modal('hide');
        $.Toast('Success', data.message, 'success', {
            position_class: "toast-top-right",
            has_progress: true,
            has_icon: false,
        })
        return
    })    
})

$('#copyRefCode').click(function(e){
    const refCode = $('input[name="refCode"]').val();
    // Copy the text inside the text field
    navigator.clipboard.writeText(refCode);
    const message = "Copied the text: " + refCode;
    $.Toast('Success', message, 'success', {
        position_class: "toast-top-right",
        has_progress: true,
        has_icon: false,
    })
    return
})