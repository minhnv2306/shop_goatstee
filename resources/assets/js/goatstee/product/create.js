function preview_image_1(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_1');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
function preview_image_2(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_2');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
function preview_image_3(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_3');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
function preview_image_4(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_4');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
function preview_image_5(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_5');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
function preview_image_6(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_6');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
