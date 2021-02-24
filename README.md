
## Rezeptについて

**Rezeptはパティシエの従業員間レシピ共有アプリです**
(レツェプトと呼んでます：ドイツ語でレシピという意味 by google翻訳)


## 概要
1. **・何ができるのか？**
- このwebアプリの中でポジションを持たせ、ポジション間でレシピを共有できるというものです
2. **・どんなポジションがあるのか？**
3. [製造長]<br>
ゲストパスワードを作成して、従業員、研修員とレシピを共有できます
4. [従業員]<br>
製造長のレシピを閲覧、編集、追加できます。自分のレシピ作成可
5. [研修員]<br>
製造長のレシピを閲覧できます。自分のレシピ作成可


## 作成経緯

1. **・僕がもともとパティシエだったから**
- 20歳から25歳の約五年間札幌のドイツ菓子屋で働いていて
- その時で働いていた経験を元にこういうのが欲しかったなあというものを作りました
2. **・お菓子✖︎ITの皆無さ**
- やめて2年近く経ってるので変わってるかもしれないですが
- お菓子屋の中でレジやオーブンなどのハードウェア以外にITが入り込める余地がなく、
- そもそも実際のエンジニアの方は伸びている産業ではないお菓子の方に参入しないだろうなと思い作りました

### 機能一覧
**[ユーザー登録機能]**
**・SNS連携**
ーgoogleのアカウントでログインできる
**・仮登録**
以下の項目を入力することで仮登録できる
ーメールアドレス
ーパスワード
**・認証メール送信**
ー仮登録完了時、本登録用のメールが自動送信される
**・本登録**
ー登録されたメールアドレスのリンクを踏むことで本登録できる
**[ログイン機能]**
**・ログイン**
以下の項目を入力することでログインできる
ー名前
ーパスワード
**・誤ログイン防止**
ー10回ログインに失敗すると３０分間ログインできなくなる
**[ゲストログイン機能]**
**・ゲストログイン**
ーお試しで使うことができる。ポジションごとに用意
ー製造長、従業員、研修員の三つ
**[従業員、研修員の製造長のレシピ参照機能]**
**・製造長のレシピにログイン**
以下の項目を入力することでログインできる
ー製造長の名前
ー製造長の作成したゲストパスワード
ー一度登録したらワンタップでログインできる
ーもしゲストパスワードが変わっていたら自動的にhomeにリダイレクトされて再入力
**[レシピ閲覧]**
**・製造長権限**
以下のことができる
ーゲスト用パスワード何度でも設定
ーレシピの編集、削除、追加
ー自分のお店だけのレシピを閲覧（掲示板のように他と混ざらないようにする）
**・製造長、従業員、研修員共通権限**
以下のことができる
ーレシピ閲覧
ー検索バーを用意してレシピを検索できる
ー状態も変化して確認できる（焼き菓子や生菓子など）
**[レシピ作成]**
**・作成**
入力する項目
ー菓子名
ー材料名
ー作り方
ー写真
（菓子名、作り方以外はnullでも可）
**・削除**
ー自分のレシピだけ削除が可能
ー削除するときアラートで注意喚起
**・編集**
ー製造長、従業員だけ編集できる
編集できる項目
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
