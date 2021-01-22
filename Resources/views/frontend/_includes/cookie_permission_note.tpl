{extends file="parent:frontend/_includes/cookie_permission_note.tpl"}
{namespace name="frontend/cookiepermission/index"}

{block name='cookie_removal_container_footer'}
    {capture name="cookie_removal_container_footer"}
        {$smarty.block.parent}
    {/capture}
{/block}

{block name="cookie_removal_container"}
    {capture name="cookie_removal_container"}
        {$smarty.block.parent}
    {/capture}

    <div class="cookie-removal--container">
        <p>
            {s name="cookiePermission/infoText"}{/s}<br>
        </p>
        <ul class="cookie-removal--list">
            <li>{s name="cookiePermission/productToCart"}{/s}</li>
            <li>{s name="cookiePermission/productRecommandations"}{/s}</li>
        </ul>

        {$smarty.capture.cookie_removal_container_footer}
    </div>
{/block}
