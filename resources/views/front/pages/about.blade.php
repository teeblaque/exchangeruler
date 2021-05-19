@extends('front.welcome')

@section('contents')
   <section class="works">
      <div class="container">
<div class="bg-light">
  <div class="container ">
    <div class="row align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">About <strong style="color: orange;font-size: 40px">Exchange Ruler</strong></h1>
        <p class="font-italic  text-muted mb-0" style="text-align: justify;line-height: 150%">foremost Crypto exchange platform, we are in the business of bridging international trade gap in cryptocurrencies and gift card exchange according to the recent CNBC statistics which shows about 21 billion of unused gift cards lay idle in people's wallet, pockets or wardrobe, Exchange Ruler Nigeria is a solution provider and we stand strategically in the right gap to ease conversion of unused gift cards to Nigerians in the shortest possible time, either its a gift from a family member abroad or payment towards a service rendered, we are always here buying at the best market value. </p>
        <p class="lead text-muted">
        </p>
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('test/images/about/logo_2.png') }}" width="300" height="300" alt="" class="rotate8d img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-blue">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-gift fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Gift Card</h2>
        <p class="font-italic text-muted mb-4"  style="text-align: justify;line-height: 150%"> A gift card is a prepaid debit card that contains a specific amount of money available for use for a variety of purchases.

Gift cards are a form of prepaid debit cards loaded with funds for future use. There are generally two types of gift cards: open loop and closed loop cards. Both types can typically be used online and in person.

Many gift cards will have a minimum and maximum initial loading amount. A common minimum is $10, and a common maximum is $500. In some situations, they can be used to pay for a portion of a purchase with cash, debit or credit used to balance the expense. As a precaution to mitigate the risk of losses, many gift cards can also be registered online—a procedure which allows the remaining balance to be tracked and frozen if a card is lost. In this way, some gift cards are safer than cash.</p><a href="{{ route('login') }}" class="btn btn-success px-5 rounded-pill shadow-sm" style="color: white !important;font-weight: bolder;">Trade Now</a>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2">
          <img src="{{ asset('test/images/about/GIFTCARDS.png') }}" alt="" class="img-fluid mb-4 mb-lg-0 spin4">
        </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="images/bbc.png" alt="" class="img-fluid bounce mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-btc fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Bitcoin</h2>
        <p class="font-italic text-muted mb-4"  style="text-align: justify;line-height: 150%"> Bitcoin is a digital currency created in January 2009 following the housing market crash. It follows the ideas set out in a whitepaper by the mysterious and pseudonymous Satoshi Nakamoto. The identity of the person or persons who created the technology is still a mystery. Bitcoin offers the promise of lower transaction fees than traditional online payment mechanisms and is operated by a decentralized authority, unlike government-issued currencies.

There are no physical bitcoins, only balances kept on a public ledger that everyone has transparent access to, that – along with all Bitcoin transactions – is verified by a massive amount of computing power. Bitcoins are not issued or backed by any banks or governments, nor are individual bitcoins valuable as a commodity. Despite it not being legal tender, Bitcoin charts high on popularity, and has triggered the launch of hundreds of other virtual currencies collectively referred to as Altcoins. </p><a href="{{ route('login') }}" class="btn btn-success px-5 rounded-pill shadow-sm" style="color: white !important;font-weight: bolder;">Trade Now</a>
      </div>
    </div>
  </div>
</div>

    </section>
@endsection
