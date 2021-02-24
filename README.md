
## Rezeptについて

**Rezeptはパティシエの従業員間レシピ共有アプリです**<br>
(レツェプトと名付けました：ドイツ語でレシピという意味 by google翻訳)


## 概要
1. **何ができるのか？**
   - このwebアプリの中でポジションを持たせ、ポジション間でレシピを共有できるというものです
2. **どんなポジションがあるのか？**
   - [製造長]<br>
  ゲストパスワードを作成して、従業員、研修員とレシピを共有できます
   - [従業員]<br>
     製造長のレシピを閲覧、編集、追加できます。自分のレシピ作成可
   - [研修員]<br>
     製造長のレシピを閲覧できます。自分のレシピ作成可


## 作成経緯

1. **僕がもともとパティシエだったから**
   - 20歳から25歳の約五年間札幌のドイツ菓子屋で働いていて<br>
 その時で働いていた経験を元にこういうのが欲しかったなあというものを作りました
2. **お菓子✖︎ITの皆無さ**
   - やめて2年近く経ってるので変わってるかもしれないですが <br>
お菓子屋の中でレジやオーブンなどのハードウェア以外にITが入り込める余地がなく、<br>
そもそも実際のエンジニアの方は伸びている産業ではないお菓子の方に参入しないだろうなと思い作りました

## 機能一覧
1. **[ユーザー登録機能]**
   - **SNS連携**
     - googleのアカウントでログインできる
   - **仮登録**
     以下の項目を入力することで仮登録できる
     - メールアドレス
     - パスワード
   - **認証メール送信**
     - 仮登録完了時、本登録用のメールが自動送信される
   - **本登録**
     - 登録されたメールアドレスのリンクを踏むことで本登録できる
2. **[ログイン機能]**
   - **ログイン**
     - 以下の項目を入力することでログインできる
     - 名前
     - パスワード
   - **誤ログイン防止**
     - 10回ログインに失敗すると３０分間ログインできなくなる
3. **[従業員、研修員の製造長のレシピ参照機能]**
   - **製造長のレシピにログイン**
     - 以下の項目を入力することでログインできる
       - 製造長の名前
       - 製造長の作成したゲストパスワード
     - 一度登録したらワンタップでログインできる
     - もしゲストパスワードが変わっていたら自動的にhomeにリダイレクトされて再入力
4. **[レシピ閲覧]**
   - **製造長権限**
     - 以下のことができる
     - ゲスト用パスワード何度でも設定
     - レシピの編集、削除、追加
     - 自分のお店だけのレシピを閲覧（掲示板のように他と混ざらないようにする）
   - **製造長、従業員、研修員共通権限**
     - 以下のことができる
     - レシピ閲覧
     - 検索バーを用意してレシピを検索できる
     - 状態も変化して確認できる（焼き菓子や生菓子など）
5. **[レシピ作成]**
   - **作成**
     - 入力する項目
     - 菓子名
     - 材料名
     - 作り方
     - 写真
     - （菓子名、作り方以外はnullでも可）
   - **削除**
     - 自分のレシピだけ削除が可能
     - 削除するときアラートで注意喚起
   - **編集**
     - 製造長、従業員だけ編集できる
     - 編集できる項目
     - 菓子名
     - 材料名
     - 作り方
     - 写真




## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
