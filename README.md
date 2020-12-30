# Magento 2 Save Cart GraphQL

**Magento 2 Save Cart GraphQL is now a part of the Mageplaza Save Cart extension that adds GraphQL features. This supports PWA Studio.** 

[Mageplaza Save Cart for Magento 2](https://www.mageplaza.com/magento-2-save-cart/) is an effective tool to reduce abandonment carts and boost sales. For many reasons, your customers have items they want to buy but can’t. Therefore, there will be a time when they add products to the shopping cart but don’t process the checkout. That’s one of the reasons why the abandoned carts in your store increase. Therefore, the extension enables your customers to save their shopping carts to purchase later. When your customers are ready to buy, they can return to your store and buy what they added to their cart before. 

Customers can save the whole cart or specific items up to their choices. Via one click, customers can save the whole cart with all of the items in it. They can change the names of the saved carts into more easy-to-remember ones and add descriptions for their carts. Saved carts will be logged in customers’ accounts, which is convenient for them to find back their carts and continue the purchases anytime they want. In case shoppers add many items to their cart but can’t pay for all of them at a time, saving some of items for later shopping is a great idea. Customers can simply click on the “Buy Later” button under each item to move them to their saved cart. 

The extension enables your customers to get the saved carts’ links and use them for different purposes, such as referring to friends. Their friend can open the carts and purchase the same items in the cart without difficulty. You can also use saved carts’ links as internal or external links that lead to more conversions to your website. 

When customers return to your store and create another shopping cart with new items, they can restore and add up the number of items in their saved cart to the current cart. They can then buy all of them together easily without finding each item they would like to buy before. 

The extension also uses a pop-up and AJAX technology to make the save cart process more friendly and efficient. Accordingly, after customers click on the Save Cart button, a pop-up will immediately show up to quickly confirm and verify the customers’ saved carts with name and description. The AJAX technology helps customers move any products to the saved product list without being redirected to a new page. This will improve the customer shopping experience and increase your store performance.


## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-save-cart-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

**Note:**
Save Cart GraphQL requires installing [Mageplaza Save Cart](https://www.mageplaza.com/magento-2-save-cart/) in your Magento installation.

## 2. How to use

To perform GraphQL queries in Magento, please do the following requirements:

- Use Magento 2.3.x or higher. Set your site to [developer mode](https://www.mageplaza.com/devdocs/enable-disable-developer-mode-magento-2.html).
- Set GraphQL endpoint as `http://<magento2-server>/graphql` in url box, click **Set endpoint**.
  (e.g. `http://dev.site.com/graphql`)
- To view the queries that the **Mageplaza Save Cart GraphQL** extension supports, you can look in `Docs > Query` in the right corner

## 3. Devdocs

- [Magento 2 Save Cart API & examples](https://documenter.getpostman.com/view/10589000/T1DiEfN8?version=latest)
- [Magento 2 Save Cart GraphQL & examples](https://documenter.getpostman.com/view/10589000/TVsuC7mq)


## 4. Contribute to this module

Feel free to **Fork** and contribute to this module. 
You can reate a pull request so we will merge your changes main branch.

## 5. Get Support

- Feel free to [contact us](https://www.mageplaza.com/contact.html) if you have any further questions.
- Like this project, Give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)
