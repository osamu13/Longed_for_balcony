# ベランダのおしゃれに気にかけている人が話し合えるアプリ
### URL
https://longedforbalcony.com/

### 目的
母がベランダのオシャレの仕方がわからず、困っていた。<br>
そのため、「ベランダ・バルコニーをオシャレにしたい人のコミュニティを作り繋げる」をコンセプトに作った。

### 使用技術
* Laravel
* Bootstrap
* AWS(EC2,RDS)
* Vue.js
* Chart.js

### 主な使い方
#### ・投稿機能
1. 「投稿したい人はこちら」をクリックする。
<img width="800" alt="スクリーンショット 2022-03-01 20 15 19" src="https://user-images.githubusercontent.com/67495262/156159463-c4350a70-440b-487b-bdef-755cd3aa6ba6.png">
2. 全部記入して、投稿ボタンを押す。
<img width="800" alt="スクリーンショット 2022-03-01 20 20 08" src="https://user-images.githubusercontent.com/67495262/156160220-5efba324-f4aa-4acb-9e08-9fbb3410b7cc.png">

#### ・コメント機能
1. 「コメントして」をクリックする
<img width="318" alt="スクリーンショット 2022-03-10 15 41 52" src="https://user-images.githubusercontent.com/67495262/157604300-35647371-53aa-430d-92dc-f1a95f99868d.png">
2.　コメント内容をかき、「コメントして」をクリックする
<img width="800" alt="スクリーンショット 2022-03-10 15 45 27" src="https://user-images.githubusercontent.com/67495262/157604696-d6067a51-b3ac-4933-98d8-02a60a31b6e7.png">

#### ・いいね機能
1. いいねしていない状態
<img width="373" alt="スクリーンショット 2022-03-10 15 50 33" src="https://user-images.githubusercontent.com/67495262/157605337-85478a4c-5fc5-4813-88b1-d12f5fd27bc0.png">
2.　いいねした状態
<img width="373" alt="スクリーンショット 2022-03-10 15 49 24" src="https://user-images.githubusercontent.com/67495262/157605260-4e9b4508-2cbf-4b95-aceb-803c32ac2394.png">

#### ・検索機能
1. 文字を入力する
<img width="586" alt="スクリーンショット 2022-03-10 15 51 48" src="https://user-images.githubusercontent.com/67495262/157605621-51401cc8-fee4-420c-abac-abcb3b77d45c.png">
2.　検索にヒットした投稿が表示される
<img width="586" alt="スクリーンショット 2022-03-10 15 53 12" src="https://user-images.githubusercontent.com/67495262/157605854-ef7cf96b-0863-471e-add0-83a37c1478d8.png">


### 頑張った点
* 投稿者名を押すと、特定のユーザのページに遷移する。<br>そこでchart.jsを導入し、そのユーザが投稿した数とコメントした数をグラフ化することで情報を可視化した。
* いいね機能を非同期で実装した。Vue.jsを使い、コンポーネント化することで保守性を高めた。
* 検索フォームを作ることで、ユーザが求めている投稿まですぐに辿り着けるようにした。
* メインターゲットユーザが主婦の方だったので、ネットが苦手な人でも感覚的に操作できるUIを心がけた。
* スマホの時でも、デザインが崩れることがないようにレスポンシブ対応した。
* テストコードを書き、機能にミスがないかを確認した
* デプロイをAWSで行なった。

### 今後の計画
* カテゴリ検索をもっと簡単に実装したいと考えている
