<html>
<script src="https://js.paystack.co/v1/inline.js"></script>
<body onload="payWithPaystack()">

</body>
</html>


<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: 'pk_test_a6540d78a5fab3d175454387c9be154a75ceb532',
            email: '{{Auth::user()->email}}',
            amount: '50000',
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: "+2348012345678"
                    }
                ]
            },
            callback: function(response){
                alert('success. transaction ref is ' + response.reference);
                window.location.replace("{{route('requests.index')}}");

            },
            onClose: function(){
                alert('window closed');
                window.location.replace("{{route('students.index')}}");
            }
        });
        handler.openIframe();
    }
</script>
