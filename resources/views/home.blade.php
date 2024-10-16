@include('header') 
<!-- SPLIDE -->
<div class="flex d-column w-100 conBottom">
    <div class="container splide_carousel" style="margin-bottom: 16px;">
        <div id="splide_carousel_container" class="splide">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <a href="www.pizzaheist.in" target="_blank">
                            <img style="border-radius: 10px;" src="https://dukaan.b-cdn.net/600x600/webp/5885408/21b71ee3-2baa-4293-8e8b-33140c85b024/1651992920320-6084da33-883f-4fba-886c-91e358a46625.jpeg" alt="bannerImage">
                        </a>
                    </div>
                    <div class="splide__slide">
                        <a href="#" target="_self">
                            <img style="border-radius: 10px;" src="https://dukaan.b-cdn.net/600x600/webp/5885408/21b71ee3-2baa-4293-8e8b-33140c85b024/1645359885952-f9c6672e-2234-4c01-a873-bf0f1c0ff7ff.jpeg" alt="bannerImage">
                        </a>
                    </div>
                    <div class="splide__slide">
                        <a href="pizzaheist.in" target="_blank">
                            <img style="border-radius: 10px;" src="https://dukaan.b-cdn.net/600x600/webp/5885408/21b71ee3-2baa-4293-8e8b-33140c85b024/1646234575562-39e32617-a344-4c70-a39a-713c04197277.jpeg" alt="bannerImage">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SIDE BAR -->
<div class="container flex a-start" style="align-items: stretch; flex: 1 1;">
    <!-- MENU LIST -->
    <div class="categories-sidebar flex d-column f-start sticky hide-mob" style="padding: 16px; ">
        <category-sidebar-item-load-point style="display: contents;">
            @foreach($items as $menuItem)
                <div class="categories-sidebar-item w100 c-black-30 t-16_24 " name="{{ $menuItem->id }}" onclick="handleClickScroll(event, '{{ $menuItem->id }}')">
                    <div class="fB j-fs a-c" style="cursor: pointer;margin-bottom: 8px;">
                        <span>{{ $menuItem->item }}</span>
                        <span> ({{ $menuItem->total }})</span>
                    </div>
                </div>
            @endforeach
        </category-sidebar-item-load-point>
    </div>
    <!-- ITEM LIST -->
    <div class="category-products-section flex d-column ">
        <best-seller-load-point>
            @foreach($subItems as $itemKey => $submenuItem)
                <div class="dkn-home-category-sections category-section" id="{{ $submenuItem['subitems'][0]->prime_items_id }}" style="margin-bottom: 20px;">
                    <div class="fB d-c" style="border: 1px solid #e6e6e6;">
                        <div class="category-name-header sticky lineClamp">
                            <div class="category-name t-20_32 mt-16_24 medium fB a-c whiteSpace-noWrap">
                                {{ $submenuItem['subitems'][0]->subitems }} 
                                <span class="cart-sidebar-badge py2 px6 ml8 hide-on-mobile">{{ $submenuItem['total'] }}</span>
                            </div>
                        </div>
                        <div class="product-list flex d-column" style="margin-top: 12px;">
                            @foreach($submenuItem['subitems'] as $subitem)
                                <div class="product-item flex a-center">
                                    <!-- IMAGE -->
                                    <div>
                                        <div class="product-image-wrapper">
                                            <img loading="lazy" class="product-image bordered" src={{ asset($subitem->item_img) }} alt="" onerror="imageOnError(event)">
                                            <div class="product-discount-percent product-discount-badge sm-badge pdb-bottom-center t-12_16">{{ $subitem->percentage }}% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-information ml20 m-ml12 flex d-column">
                                        <div class="flex d-row j-start a-start">
                                            <div class="product-name lineClamp2 c-black textCapitalize t-18_26 mt-14_18 medium">{{ $subitem->subitems }}</div>
                                        </div>
                                        <div class="price-information flex j-sb a-center">
                                            <div class="fB j-fs a-c t-20_28 mt-15_22">
                                                <div class="product-selling-price product-price mr8 m-mr4 medium">₹{{ $subitem->price }}</div>
                                                <div class="product-original-price strikethrough c-black-50 t-smaller ">₹{{ $subitem->dis_price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </best-seller-load-point>
    </div>
    <!-- CART -->
    <div class="cart-sidebar flex d-column sticky hide-mob" style="width: 300px;">
        <div class="cart-sidebar-header sticky ">
            <div class="fB j-sb a-c">
                <h2 class="medium">Cart</h2>
            </div>
        </div>
        <cart-product-list class="cart-products-list flex d-column">
            <div class="textCenter">
                <div style="height: 132px; width: 223px;">
                  <lottie-player src="/public/dukaan/common/assets/empty-bag-lottie.json" background="transparent" speed="1" class="empty-bag-lottie" autoplay=""></lottie-player>
                </div>
                <span style="font-size: 16px;line-height: 24px;">Your cart is empty</span>
                <p class="text mt4 t-14_20 c-black-50 regular textCenter">Looks like you haven't made your choice yet.</p>
            </div>
        </cart-product-list>
    </div>
</div>
@include('footer') 