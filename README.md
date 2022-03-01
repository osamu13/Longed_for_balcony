# Longed_for_balcony
### 目的
母がベランダのオシャレの仕方がわからず、困っていた。<br>
そのため、「ベランダ・バルコニーをオシャレにしたい人のコミュニティを作り繋げる」をコンセプトに作った。

### 使い方
#### ・投稿したい人
1. 「投稿したい人はこちら」をクリックする。
<img width="800" alt="スクリーンショット 2022-03-01 20 15 19" src="https://user-images.githubusercontent.com/67495262/156159463-c4350a70-440b-487b-bdef-755cd3aa6ba6.png">
2. 全部記入して、投稿ボタンを押す。
<img width="800" alt="スクリーンショット 2022-03-01 20 20 08" src="https://user-images.githubusercontent.com/67495262/156160220-5efba324-f4aa-4acb-9e08-9fbb3410b7cc.png">

### 頑張った点
* 投稿者名を押すと、特定のユーザのページに遷移する。<br>そこでchart.jsを導入し、そのユーザが投稿した数とコメントした数をグラフ化することでわかりやすくした。
* いいね機能を非同期で実装した。またVue.jsを使い、コンポーネント化することで保守性を高めた。
* 検索フォームを作ることで、ユーザが求めている投稿まですぐに辿り着けるようにした。
* メインターゲットユーザが主婦の方だったので、`ネットが苦手な人でも感覚的に操作できるUI`を心がけた。
* スマホの時でも、デザインが崩れることがないようにレスポンシブ対応した。

### 問題点
* 思いついてからすぐ作成に取り掛かったため、ニッチな内容になってしまった。そのため、ユーザを集めるのが大変そうだと感じた。

### 結果
自作アプリケーションを作ったのは初めてだったので、簡易的なアプリケーションだが学ぶことはとても多かった。<br>
→「母の課題解決」と「自分の成長」が同時に見込めるできるいい機会になった。

### 今後の計画
* ユーザ間のフォロー機能やチャット機能などの機能アップデートを考えている。
