
## Rezeptについて

**Rezeptはパティシエの従業員間レシピ共有アプリです**<br>
(レツェプトと呼んでます：ドイツ語でレシピという意味 by google翻訳)


## 概要
**・何ができるのか？**<br>
このwebアプリの中でポジションを持たせ、ポジション間でレシピを共有できるというものです<br>
**・どんなポジションがあるのか？**<br>
[製造長]<br>
ゲストパスワードを作成して、従業員、研修員とレシピを共有できます<br>
[従業員]<br>
製造長のレシピを閲覧、編集、追加できます。自分のレシピ作成可<br>
[研修員]<br>
製造長のレシピを閲覧できます。自分のレシピ作成可<br>


## 作成経緯

**・僕がもともとパティシエだったから**<br>
20歳から25歳の約五年間札幌のドイツ菓子屋で働いていて
その時で働いていた経験を元にこういうのが欲しかったなあというものを作りました<br>
**・お菓子✖︎ITの皆無さ**<br>
やめて2年近く経ってるので変わってるかもしれないですが
お菓子屋の中でレジやオーブンなどのハードウェア以外にITが入り込める余地がなく、
そもそも実際のエンジニアの方は伸びている産業ではないお菓子の方に参入しないだろうなと思い作りました

### 機能一覧
**[ユーザー登録機能]**<br>
**・SNS連携**<br>
ーgoogleのアカウントでログインできる<br>
・仮登録<br>
以下の項目を入力することで仮登録できる<br>
ーメールアドレス<br>
ーパスワード<br>
・認証メール送信<br>
ー仮登録完了時、本登録用のメールが自動送信される<br>
・本登録<br>
ー登録されたメールアドレスのリンクを踏むことで本登録できる<br>
**[ログイン機能]**<br>
・ログイン<br>
ー以下の項目を入力することでログインできる<br>
ー名前<br>
ーパスワード<br>
・誤ログイン防止<br>
ー10回ログインに失敗すると３０分間ログインできなくなる<br>
**[ゲストログイン機能]**<br>
・ゲストログイン<br>
ーお試しで使うことができる。ポジションごとに用意<br>
ー製造長、従業員、研修員の三つ<br>
**[従業員、研修員の製造長のレシピ参照機能]**<br>
・製造長のレシピにログイン<br>
ー以下の項目を入力することでログインできる<br>
ー製造長の名前<br>
ー製造長の作成したゲストパスワード<br>
・一度登録したらワンタップでログインできる<br>
・もしゲストパスワードが変わっていたら自動的にhomeにリダイレクトされて再入力<br>
**[レシピ閲覧]**<br>
・製造長権限<br>
ー以下のことができる<br>
ーゲスト用パスワード何度でも設定<br>
ーレシピの編集、削除、追加<br>
ー自分のお店だけのレシピを閲覧（掲示板のように他と混ざらないようにする）<br>
・製造長、従業員、研修員共通権限<br>
ー以下のことができる<br>
ーレシピ閲覧<br>
ー検索バーを用意してレシピを検索できる<br>
ー状態も変化して確認できる（焼き菓子や生菓子など）<br>
**[レシピ作成]**<br>
・作成<br>
ー入力する項目<br>
ー菓子名<br>
ー材料名<br>
ー作り方<br>
ー写真<br>
（菓子名、作り方以外はnullでも可）<br>
・削除<br>
ー自分のレシピだけ削除が可能<br>
ー削除するときアラートで注意喚起<br>
・編集<br>
ー製造長、従業員だけ編集できる<br>
ー編集できる項目<br>
ー菓子名<br>
ー材料名<br>
ー作り方<br>
ー写真<br>




## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
