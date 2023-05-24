@props(['invoice'])

<div class="d-flex row justify-content-center">
    <a href="{{ route('invoices.post', $invoice->id) }}">Download</a>
</div>