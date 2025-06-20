<div>
    <object data="{{ url('/storage/'.$pdf) }}" type="application/pdf" width="100%" height="700px">
        <p>Unable to display PDF file. <a href="{{ url($pdf) }}">Download</a> instead.
        </p>
    </object>
</div>

