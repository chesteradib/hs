{extends file='checkout/_partials/steps/checkout-step.tpl'}

{block name='step_content'}
    {render file='checkout/_partials/customer-form.tpl' ui=$register_form guest_allowed=$guest_allowed}
{/block}
