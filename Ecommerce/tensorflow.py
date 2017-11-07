import tensorflow as tf 

X = tf.placeholder(tf.float32,[None,28,28,1])
W = tf.variable(tf.zeros([784,10]))

b = tf.variable(tf.zeros([10]))

init= tf.initialize_all_variables()

Y = tf.nn.softmax(tf.matmul(tf.reshape(X,[-1,784]),W)+b)

Y_ = tf.placeholder(tf.float32, [None,10])

cross_entropy = tf.reduce_sum(Y_ * tf.log(Y))

is_correct = tf.equal(tf.argmax(Y,1),tf.argmax(Y_,1))
accuracy = tf.reduce_mean(tf.cast(is_correct,tf.float32))
optimizer = tf.train.GradientDescentOptimizer(0.0003)
train_step = optimizer.minimize(cross_entropy)

sess = tf.Session()
sess.run(init)

for i in range(10000):
	batch_X, batch_Y = mnist.train.next_batch(100)
	train_data = {X: batch_X, Y_: batch_Y}


	sess.run(train_step, feed_dict=train_data)

	a, c = sess.run([accuracy, cross_entropy], feed_dict=train_data)

	test_data = {X:mnist.test.images, Y_:mnist.test.labels}
	a, c = sess.run([accuracy, cross_entropy], feed_dict=train_data)
	










