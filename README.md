
## Rezeptについて

**Rezeptはパティシエの従業員間レシピ共有アプリです**<br>
(レツェプトと名付けました：ドイツ語でレシピという意味 : google翻訳)
![tNAdkcN2IPgt9Ziyz1Vg1614497054-1614497071](https://user-images.githubusercontent.com/72287165/109411008-33967400-79e2-11eb-9536-945413624089.gif)
![zSttdRdpHZhHJFFwK8UF1614497296-1614497316](https://user-images.githubusercontent.com/72287165/109411017-46a94400-79e2-11eb-89a4-a7b54f2442f6.gif)

## 概要
1. **何ができるのか？**
   - このwebアプリの中でポジションを持たせ、ポジション間でレシピを共有できるというものです
2. **どんなポジションがあるのか？**
   - *[製造長]*<br>
  ゲストパスワードを作成して、従業員、研修員とレシピを共有できます
   - *[従業員]*<br>
     製造長のレシピを閲覧、編集、追加できます。自分のレシピ作成可
   - *[研修員]*<br>
     製造長のレシピを閲覧できます。自分のレシピ作成可


## 作成経緯

1. **僕がもともとパティシエだったから**
   - 20歳から25歳の約五年間札幌のドイツ菓子屋で働いていて<br>
 その時で働いていた経験を元にこういうのが欲しかったなあというものを作りました（上の2枚目のgifは実際に僕が作って全国のコンクール米粉を使った焼き菓子部門で銅賞、北海道で金賞をもらったものです💪）
2. **お菓子業界に少しでも貢献したい**
   - やめて2年近く経ってるので変わってるかもしれないですが <br>
お菓子屋の中でレジやオーブンなどのハードウェア以外にITが入り込める余地がなく、<br>
お菓子のもつ凄さを広めてる人の少しでも力になればと思い作りました



## 機能
1. **[ユーザー登録機能]**
   - SNS連携
     - googleのアカウントでログインできる
   - 認証メール送信
     - 仮登録完了時、本登録用のメールが自動送信される
2. **[ログイン機能]**
3. **[レシピ作成]**
   - 作成
     - 菓子名、材料名、作り方、写真
   - 削除
   - 編集
4. **[ポジション権限]**
   - 製造長権限
     - ゲスト用パスワード何度でも設定（メール送信機能つき）
   - 製造長、従業員、研修員共通権限
     - 自分のレシピ閲覧、作成、編集
     - 自分のレシピを検索できる
     - 状態も変化して確認できる（焼き菓子や生菓子など）
   - 従業員、研修員権限
     - 製造長のレシピ参照機能
     - 製造長の名前、作成したゲストパスワード
     - 一度登録したらワンタップでログインできる
     - もしゲストパスワードが変わっていたら自動的にhomeにリダイレクトされて再入力
### その他
  - git 2.17.1
  - Linux基礎コマンド
  - Github（Pull Request, Issuesを使用）
## こだわった点
- APIの導入（googleAPI）
- N+1問題への対処
- Docker/AWSの使用
- **シンプル、共有できる、安全であるの3点を意識して作りました**
  - シンプル--実際に使う時、なるべくわかりやすいような動線を意識しました
  - 共有できる--決めたユーザーに対してのみ参照できたり、閲覧できること
  -  安全--パティシエの人たちにとってレシピは宝ですので、SSL化、ゲストパスワードの作成時のバリデーション（８文字以上、英数字、！や？などもつける）

## 使用技術
1. **バックエンド**
 - PHP 7.3 /Laravel 8.12
 - composer 2.0.11
2. **フロントエンド**
 - JavaScript/ HTML/ CSS
3. **インフラ**
 - Docker
 - AWS EC2/ VPC/ Route53/ ALB/ ACM/ S3/ RDS

## 今後の開発予定
- phpunitの追加
- 動画も載せれるようにする（作業の動画を載せたらよりイメージしやすくなる）



## ネットワーク構成図
<img width="707" alt="スクリーンショット 2021-02-27 23 11 00" src="https://user-images.githubusercontent.com/72287165/109389793-4b71e780-7951-11eb-9b1a-26875b74dd93.png">


## ER構成図
<img width="959" alt="スクリーンショット 2021-02-25 14 49 48" src="https://user-images.githubusercontent.com/72287165/109109554-d946aa80-7778-11eb-92c1-32c096a03c24.png">
