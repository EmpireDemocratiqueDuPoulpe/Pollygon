$( document ).ready(function() {
    $("input[maxlength], textarea[maxlength]").each(function (index) {

        // Set classes
        let classes = "charCount";

        if (this.value.length >= this.maxLength)
            classes += " limitReached";

        // Add span
        $(this).parent().append('<span class="'+ classes +'">'+ this.value.length +'/'+ this.maxLength +'</span>');

        // Add event
        $(this).on("change paste keydown keyup", function() {

            var count = this.value.length;
            var maxLength = this.maxLength;

            // Check limit
            if (count >= this.maxLength) {
                $(this).val($(this).val().substring(0, maxLength));
                $(this).next("span").addClass("limitReached");
                count = maxLength;
            } else {
                $(this).next("span").removeClass("limitReached");
            }

            // Set text
            $(this).parent().children("span").text(count + "/" + maxLength);
        });
    })
});