/**
 * Productの削除を確認するためのJavaScript
 * 
 * @param  none
 * @return void
 */
function deleteProductConfirm() {
    if(confirm('削除してもよろしいでしょうか？')){
        let form = document.getElementById('delete_form');
        form.submit();
    }else{
    }
}